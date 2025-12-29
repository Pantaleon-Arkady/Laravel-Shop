<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rules\File;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function create()
    {
        return view('upload');
    }

    public function store(Request $request)
    {
        // Validate the uploaded file
        $validated = $request->validate([
            'file_upload' => [
                'required',
                File::types(['png', 'jpg', 'pdf'])->max(2 * 1024), // Max 2MB
            ],
        ]);

        // Store the file in the "app/public" disk under a "files" directory
        $path = $request->file('file_upload')->store('files', 'public');

        return back()->with('success', 'File uploaded successfully! Path: ' . $path);
    }
}
