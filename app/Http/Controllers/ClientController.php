<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function client(Request $request)
    {
        return view('client');
    }

    public function index(Request $request)
    {
        $download_count = DB::table('download_logs')->get()->count();
        return view('scanner', ['download_count' => $download_count]);
    }

    function certificate_validation(Request $request)
    {
        // $this->validate($request, [
        //     'search' => 'required',
        // ]);

        $search = $request->input('search');
        $posts = DB::select("SELECT * FROM `certificate` WHERE certificate_code LIKE '$search'");
        $seminar = DB::select("SELECT * FROM `seminar`");
        return view('certificate_validation', ['allrec' => $posts, 'seminar' => $seminar]);
    }
}
