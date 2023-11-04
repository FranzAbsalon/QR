<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

class ImageController extends Controller
{
    /**
     * Generate Image View
     *
     * @return void
     */
    public function generateImageText(){
        return view('index');
    }

    /**
     * Store Generate Image
     *
     * @return void
     */
    public function generateImageTextStore(Request $request){

        $text = $request->input('text');

        if($request->file('name') != ""){

            $file = $request->file('name');

            $file_name = time().'_'.$file->getClientOriginalName();

            $img = Image::make($file);

            $img->text($text,500,220,function($font){
                $font->file(public_path("Open_Sans/OpenSans-Italic-VariableFont_wdth,wght.ttf"));
                $font->size(40);
                $font->color("#FFF");
                $font->align("center");
                $font->valign("top");
            });

            $img->save(public_path($file_name));

            return $img->response("jpg");
        }

        return back();
    }
}