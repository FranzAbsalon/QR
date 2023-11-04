<?php

namespace App\Http\Controllers;

use Exception;
use App\Mail\MailNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class MailController extends Controller
{
  public function send_email(Request $request)
  {
    
    $this->validate($request, [
      'email' => 'required|email'
    ]);

    $email = $request->input('email');
    $message = DB::select("SELECT * FROM email");
    $img = public_path('Certificate (6).pdf');
    $data = [
      "subject" => "QR Certificate Generator",
      "body" => $message[0]->email,
    ];
    // MailNotify class that is extend from Mailable class.
    try {
      Mail::to($email)->send(new MailNotify($data,$img));
      // return redirect('/home')->with('success', 'Certificate has been sent!');
      return response()->json(['msg' => 'mail sent success', 'status' => 200]);
    } catch (\Exception $e) {
      return response()->json(['msg' => 'Sorry! Please try again later', 'status' => 500]);
    }
  }
}
