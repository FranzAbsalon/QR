<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminOrgManagementController extends Controller
{
    public function adminOrg() {
        $org = DB::select("SELECT * FROM org");
        $count = DB::table('org')->count();
        return view('/admin/org-management', ['org' => $org, 'count' => $count]);
    }

    public function addOrg()
    {
        return view('admin/org-management-add');
    }

    public function storeOrg(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'name' => 'required',
        ]);

        $name = $request->input('name');
        DB::insert("INSERT INTO org (orgname) VALUES ('$name')");
        return redirect('admin/org-management');
    }

    public function showOrg($id)
    {
        $org = DB::select('SELECT * FROM org where id = ?', [$id]);
        return view('admin/org-management-update', ['org' => $org]);
    }

    public function updateOrg(Request $request, $id)
    {
        $name = $request->input('name');

        DB::update('update org set orgname = ? where id = ?',[$name, $id]);
        return redirect('admin/org-management');
    }

    public function deleteOrg($id)
    {
        DB::delete('delete from org where id = ?', [$id]);
        return redirect('admin/org-management')->with('delete', 'Record deleted successfully!');
    }
}
