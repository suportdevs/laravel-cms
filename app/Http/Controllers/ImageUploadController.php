<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->file('file')) {
            $file = $request->file('file');
            $filePath = $file->store('uploads', 'public'); // Store in the "uploads" directory

            return response()->json([
                'filePath' => asset("storage/$filePath"),
            ]);
        }

        return response()->json(['error' => 'File upload failed'], 400);
    }
}
