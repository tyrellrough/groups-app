<?php

namespace App\Http\Controllers;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function storeImage($request) {
        
        if($request->file('image')){
            $newImage = new Image();
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $newImage['image']= $filename;
            $newImage->save();
        }
        
        return redirect()->route('images.view');

    }

    public function viewImage() {
        
    }
}
