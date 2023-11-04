<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class ScanUrlController extends Controller
{
    function view_scanurl(){
        return view('scanurl');
    }

    function scan(Request $request){
       
        $url = $request->input('url');$ciphering = "AES-128-CTR";
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options   = 0;
    $ciphering = "AES-128-CTR";
    $decryption_iv = '1234567891011121';
    $decryption_key = "W3docs";
    $decryption = openssl_decrypt($url, $ciphering, $decryption_key, $options, $decryption_iv);
    echo "Decrypted String: " . $decryption;
    return redirect($decryption);
    }

}
