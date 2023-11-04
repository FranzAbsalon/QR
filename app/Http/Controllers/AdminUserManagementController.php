<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminUserManagementController extends Controller
{
    public function adminUserManagement() {
        $count = DB::table('users')->count();
        $users = DB::select("SELECT * FROM users where id != '1'");
        return view('admin/user-management',['users'=>$users, 'count' => $count]);
    }

    public function showChangeRoleUser($id) {
        $users = DB::select('SELECT * FROM users where id = ?',[$id]);
        return view('admin/user-management-user',['users'=>$users]);
    }

    public function updateChangeRoleUser(Request $request,$id) {
        $is_admin = $request->input('is_admin');

        DB::update('update users set is_admin = ?
                    where id = ?',[$is_admin,$id]);
        return redirect('admin/user-management');
    }

    public function showChangeRoleAdmin($id) {
        $users = DB::select('SELECT * FROM users where id = ?',[$id]);
        return view('admin/user-management-admin',['users'=>$users]);
    }

    public function updateChangeRoleAdmin(Request $request,$id) {
        $is_admin = $request->input('is_admin');

        DB::update('update users set is_admin = ?
                    where id = ?',[$is_admin,$id]);
        return redirect('admin/user-management');
    }
}
