<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File; // Import the File model

class FileController extends Controller
{
    public function upload(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx,jpg,jpeg|max:2048'
        ]);

        // Store the file
        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName(); // Unique filename
        $path = $file->storeAs('uploads', $filename, 'public'); // Save to public/uploads

        // Save file information to the database
        File::create([
            'name' => $filename, // File name
            'path' => $path,     // File path
        ]);

        // Return success response
        return response()->json([
            'message' => 'File uploaded successfully!',
            'file' => $filename,
            'path' => $path,
        ], 201);
    }
}
