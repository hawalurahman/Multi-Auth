<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CloudinaryController extends Controller
{
    //
    public function showUploadForm()
    {
        return view('cloudinary');
    }

    public function storeUploads(Request $request)
    {
        $response = cloudinary()->upload($request->file('file')->getRealPath())->getSecurePath();
        return back()
            ->with('success', 'File uploaded successfully');
    }
}
