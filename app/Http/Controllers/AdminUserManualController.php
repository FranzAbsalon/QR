<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminUserManualController extends Controller
{
    public function adminUserManual() {
        return view('/admin/user-manual');
    }
}
