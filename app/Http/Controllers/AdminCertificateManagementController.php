<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Models\Certificate;
use App\Http\Controllers\Controller;
use App\Models\DownloadLogs;
use chillerlan\QRCode\QRCode;
use Illuminate\Support\Str;
use PDF;

class AdminCertificateManagementController extends Controller
{
    public function adminCertificateManagement()
    {
        // $count = DB::select("SELECT COUNT(seminar) FROM certificate");
        $count = DB::table('certificate')->count();
        $certificates = DB::select("SELECT * FROM certificate");
        $seminar = DB::select("SELECT * FROM seminar");
        return view('/admin/certificate-management', ['certificates' => $certificates, 'seminar' => $seminar, 'count' => $count]);
    }

    public function adminCertificateManagementAdd()
    {
        $seminar = DB::select("SELECT * FROM seminar");
        return view('admin/certificate-management-add', ['seminar' => $seminar]);
    }

    public function adminCertificateManagementImport()
    {
        return view('admin/certificate-management-import');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:certificate'],
            'seminar_id' => ['required'],
        ]);

        $certificate = new Certificate;
        $certificate->name = $request->input('name');
        $certificate->email = $request->input('email');
        $certificate->seminar_id = $request->input('seminar_id');
        $certificate->certificate_code = $request->input('certificate_code');

        $certificate->save();
        return redirect('/admin/certificate-management');
    }

    public function showCertificateCode($id)
    {
        $certificates = DB::select('SELECT * FROM certificate where id = ?', [$id]);
        return view('admin/certificate-management-generate', ['certificates' => $certificates]);
    }

    public function updateCertificateCode(Request $request, $id)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $seminar_id = $request->input('seminar_id');
        $certificate_code = $request->input('certificate_code');

        DB::update(
            'update certificate set name = ?, email = ?, seminar_id = ?, certificate_code = ? where id = ?',
            [$name, $email, $seminar_id, $certificate_code, $id]
        );
        return redirect('admin/certificate-management');
    }

    public function showCertificate($id)
    {
        $certificates = DB::select('SELECT * FROM certificate where id = ?', [$id]);
        return view('admin/certificate-management-update', ['certificates' => $certificates]);
    }

    public function updateCertificate(Request $request, $id)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $seminar_id = $request->input('seminar_id');
        $certificate_code = $request->input('certificate_code');

        DB::update(
            'update certificate set name = ?, email = ?, seminar_id = ?, certificate_code = ? where id = ?',
            [$name, $email, $seminar_id, $certificate_code, $id]
        );
        return redirect('admin/certificate-management');
    }

    public function adminCertificateManagementMessage($id)
    {
        $seminars = DB::select("SELECT * FROM seminar");
        return view('/admin/certificate-management-message', ['seminars' => $seminars]);
    }


    public function addCert(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'name' => 'required',
            'university' => 'required',
            'certificate_code' => 'required',
        ]);


        $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $clength = strlen($char);
        $randomString = '';
        for ($i = 0; $i < 32; $i++) {
            $randomString .= $char[rand(0, $clength - 1)];
        }

        // one liner to generate a random token
        // $randomString = Str::random(32);

        $name = $request->input('name');
        $email = $request->input('email');
        $certificate_code = $request->input('certificate_code');


        $cert = DB::insert('insert into certificate (name,email,certificate_code) 
                values(?,?,?)', [$name, $email, $randomString]);


        if ($cert) {
            return ('working');
        } else {
            return ('Not Working');
        }
    }


    public function formCert($id)
    {
        $certs = DB::select('SELECT * FROM `certificate` where id = ?', [$id]);
        return view('admin/edit-cert', ['certs' => $certs]);
    }

    public function addCertificate()
    {
        return view('admin/add-certificate');
    }

    public function editCert(Request $request, $id)
    {
        $input = $request->all();

        $this->validate($request, [
            'name' => 'required',
            'content' => 'required',
            'signatures' => 'required',
            'logo' => 'required',
        ]);

        $name = $request->input('name');
        $content = $request->input('content');
        $signatures = $request->input('signatures');
        if ($request->file('signatures')) {
            $file = $request->file('signatures');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('signatures'), $filename);
            $signatures['signatures'] = $filename;
        }
        $logo = $request->input('logo');
        if ($request->file('logo')) {
            $file = $request->file('logo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('logo'), $filename);
            $logo['logo'] = $filename;
        }

        DB::update('update certificate set name = ?, content =?, signatures =?, logo =? where id = ?', [$name, $content, $signatures, $logo, $id]);
        return redirect('admin/cert');
    }

    public function deleteCert($id)
    {
        DB::delete('delete from certificate where id = ?', [$id]);
        return redirect('admin/cert')->with('delete', 'Record deleted successfully!');
    }

    public function createPDF($id, $seminar_id)
    {
        // retreive all records from db
        $users = DB::table('certificate')->where('id', $id)->first();
        $cert = DB::table('seminar')->where('id', $seminar_id)->first();
        // $users = DB::select('select * from certificate where id = ?', [$id]);
        // $cert = DB::select('select * from seminar where id = ?', [$seminar_id]);
        // dd($cert);

        $path1 = public_path() . '/uploads/template/' . $cert->template;
        // dd($path1);
        $type1 = pathinfo($path1, PATHINFO_EXTENSION);
        $data1 = file_get_contents($path1);
        $base64_cert_template = 'data:image/' . $type1 . ';base64,' . base64_encode($data1);

        $path2 = public_path() . '/uploads/logo/' . $cert->logo;
        $type2 = pathinfo($path2, PATHINFO_EXTENSION);
        $data2 = file_get_contents($path2);
        $base64_cert_logo = 'data:image/' . $type2 . ';base64,' . base64_encode($data2);

        $path3 = public_path() . '/uploads/signature/' . $cert->signature1;
        $type3 = pathinfo($path3, PATHINFO_EXTENSION);
        $data3 = file_get_contents($path3);
        $base64_cert_sig1 = 'data:image/' . $type3 . ';base64,' . base64_encode($data3);

        $base64_cert_sig2 = '';
        if ($cert->signature2 != null) {
            $path4 = public_path() . '/uploads/signature/' . $cert->signature2;
            $type4 = pathinfo($path4, PATHINFO_EXTENSION);
            $data4 = file_get_contents($path4);
            $base64_cert_sig2 = 'data:image/' . $type4 . ';base64,' . base64_encode($data4);
        }

        // share data to view
        $pdf = PDF::setOptions(['defaultFont' => 'sans-serif', 'isRemoteEnabled', FALSE])
            ->loadView('admin/pdf_cert', [
                'users' => $users, 
                'cert' => $cert,
                'base64_cert_template' => $base64_cert_template, 
                'base64_cert_logo' => $base64_cert_logo,
                'base64_cert_sig1' => $base64_cert_sig1, 
                'base64_cert_sig2' => $base64_cert_sig2
            ]);
        // download PDF file with download method
        if(auth()->user() != null) {
            DownloadLogs::create([
                'user_id' => auth()->user()->id
            ]);
        }

        return $pdf->download('Certificate.pdf');
    }
}
