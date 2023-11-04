<?php

namespace App\Http\Controllers;

use App\Models\DownloadLogs;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $download_count = DownloadLogs::where('user_id', auth()->user()->id)->get()->count();
        return view('home', ['download_count' => $download_count]);
    }

    public function adminHome()
    {
        return view('admin-home');
    }
}
