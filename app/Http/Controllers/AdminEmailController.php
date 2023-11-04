<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminEmailController extends Controller
{
    public function emailManagement() {
        $message = DB::select("SELECT * FROM email");
        return view('/admin/email-management', ['message' => $message]);
    }
    public function editEmail(Request $request){
        $email = $request->input('email');

        DB::update('update email set email=?', [$email]);
        return redirect('admin/email-management');
    }
}
