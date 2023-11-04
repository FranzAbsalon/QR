<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Imports\CertificateImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class CertificateController extends Controller
{
    /**
     * @return \Illuminate\Support\Collection
     */

    /**
     * @return \Illuminate\Support\Collection
     */

    /**
     * @return \Illuminate\Support\Collection
     */

    public function index()
    {
        $certificates = Certificate::get();
        return view('certificate', compact('certificates'));
    }

    public function import(Request $request)
    {
        try {
            $validate = Validator::make($request->all(), [
                'file' => 'required|file|mimes:xlsx'
            ]);
    
            if ($validate->fails()) {
                return redirect()->back()->withErrors($validate);
            } else {
                Excel::import(new CertificateImport, request()->file('file'));
                return back();
            }
        }
        catch (\Exception $e) {
            abort(500, $e->getMessage());
        }
    }

    // New Route 
    public function viewpdf()
    {
        return view('admin/pdf_cert');
    }
}
