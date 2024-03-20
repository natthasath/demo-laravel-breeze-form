<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UploadController extends Controller
{
    public function index()
    {
        // Read - Display a list of items
    }
    public function create()
    {
        return view('upload');
    }
    public function store(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|file|max:10240', // Adjust max size as per your requirement
        ]);

        // Check if the file was uploaded successfully
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            // Generate a UUID for the filename
            $uuid = Str::uuid();

            // Get the original file name
            $originalFileName = $request->file->getClientOriginalName();

            // Get the file extension
            $extension = $request->file->getClientOriginalExtension();

            // Construct the new filename with UUID
            $fileName = $uuid . '.' . $extension;

            // Store the file in the desired location
            $request->file->storeAs('uploads', $fileName);

            // Optionally, you can store the file path in the database or do any other processing

            return response()->json(['message' => 'File uploaded successfully']);
        }

        return response()->json(['message' => 'File upload failed'], 500);
    }
    public function show($id)
    {
        // Read - Display a single item
    }
    public function edit($id)
    {
        // Update - Show the form to edit an item
    }
    public function update(Request $request, $id)
    {
        // Update - Save the edited item to the database
    }
    public function destroy($id)
    {
        // Delete - Remove an item from the database
    }
}
