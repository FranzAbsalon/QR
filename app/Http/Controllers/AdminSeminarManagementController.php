<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Seminar;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use PDF;

class AdminSeminarManagementController extends Controller
{
    public function adminSeminarManagement()
    {
        $seminars = DB::select("SELECT * FROM seminar");
        $count = DB::table('seminar')->count();
        return view('admin/seminar-management', ['seminars' => $seminars, 'count' => $count]);
    }
    public function addSeminarManagement()
    {
        $orgs = DB::select("SELECT * FROM org");
        return view('admin/seminar-management-add', ['orgs' => $orgs]);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'name' => 'required',
            'start' => 'required',
            'end' => 'required',
            'university' => 'required',
            'address' => 'required',
            'signature_no' => 'required',
            'certificate' => 'required',
            'logo' => 'required|mimes:jpeg,jpg,png',
            'signature1' => 'required|mimes:jpeg,jpg,png',
            'signature2' => 'exclude_if:signature_no,1|required|mimes:jpeg,jpg,png',
            'template' => 'required|mimes:jpeg,jpg,png',
        ]);

        $seminar = new Seminar;
        $seminar->name = $request->input('name');
        $seminar->start = $request->input('start');
        $seminar->end = $request->input('end');
        $seminar->signature_no = $request->input('signature_no');

        $seminar->university = $request->input('university');
        $seminar->address = $request->input('address');
        $seminar->certificate = $request->input('certificate');

        if ($request->hasfile('logo')) {
            $file = $request->file('logo');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extenstion;
            $file->move('uploads/logo/', $filename);
            $seminar->logo = $filename;
        }

        if ($request->hasfile('signature1')) {
            $file = $request->file('signature1');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extenstion;
            $file->move('uploads/signature/', $filename);
            $seminar->signature1 = $filename;
        }

        if ($request->hasfile('signature2')) {
            $file = $request->file('signature2');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extenstion;
            $file->move('uploads/signature/', $filename);
            $seminar->signature2 = $filename;
        }

        if ($request->hasfile('template')) {
            $file = $request->file('template');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extenstion;
            $file->move('uploads/template/', $filename);
            $seminar->template = $filename;
        }

        $seminar->save();
        return redirect('admin/seminar-management');
    }

    public function viewSeminarManagement($id)
    {
        $seminars = DB::select('SELECT * FROM seminar where id = ?', [$id]);
        return view('admin/seminar-management-view', ['seminars' => $seminars]);
    }

    public function showSeminar($id)
    {
        $seminars = DB::select('SELECT * FROM seminar where id = ?', [$id]);
        return view('admin/seminar-management-update', ['seminars' => $seminars]);
    }

    public function updateSeminar(Request $request, $id)
    {
        $name = $request->input('name');
        $start = $request->input('start');
        $end = $request->input('end');
        $university = $request->input('university');
        $certificate = $request->input('certificate');

        DB::update(
            'update seminar set name = ?, start = ?, end = ?, university = ?, certificate = ? where id = ?',
            [$name, $start, $end, $university, $certificate, $id]
        );
        return redirect('admin/seminar-management');
    }

    public function deleteSeminar($id)
    {
        DB::delete('delete from seminar where id = ?', [$id]);
        return redirect('admin/seminar-management')->with('delete', 'Record deleted successfully!');
    }
}
