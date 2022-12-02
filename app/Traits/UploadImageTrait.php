<?php

namespace App\Traits;

use Symfony\Component\HttpFoundation\Request;

trait UploadImageTrait
{

    public function uploadeimage(Request $request,$foldername){
        $image =$request->file('path')->getClientOriginalName();
        $path =$request->file('path')->storeAs($foldername,$image,'shahin');
        return $path;
    }
}
