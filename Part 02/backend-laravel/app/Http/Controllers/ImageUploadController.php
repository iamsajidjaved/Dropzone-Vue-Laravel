<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function fileStore(Request $request)
    {
        return $request->all();
        
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(storage_path('images'), $imageName);
    }
}
