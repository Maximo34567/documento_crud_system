<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File as FileSystem;
use App\Models\File as FileModel;
use App\Models\Roles;
use App\Models\Client;
use App\Models\Folder;

use App\Models\Media;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

use Illuminate\Http\Request;

class FileController extends Controller
{

    public function dashboard()
    {
        $totalFiles = FileModel::count();
        $totalRoles = Roles::count();
        $totalClient = Client::count();
        $totalFolder = Folder::count();

        return view('file.dashboard', compact('totalFiles', 'totalRoles', 'totalClient', 'totalFolder'));
    }

    public function create()
    {
        return view('file.create');
    }

    public function view()
    {
        $files = FileModel::all(); // Fetch all files from the database
        return view('file.view', ['files' => $files]); // Pass the $files variable to the view
    }

    public function destroy($id) {

        $file = FileModel::findorfail($id);
        $file->delete();

        return redirect()->route('file.view')->with('success', 'File deleted successfully');
    }

    public function store(Request $request) {
        // Validate the incoming request data, including file validation
        $request->validate([
            'fileName' => 'required',
            'file' => 'required', // Ensure 'file' is provided
            'fileDescription' => 'required',
        ]);

        $file = $request->file('file');
        $originalFileName = $file->getClientOriginalName(); // Get the original file name
        $extension = $file->getClientOriginalExtension(); // Get the file extension

        // Generate a unique file name with timestamp prefix and original extension
        $fileName = time() . '_' . str_replace(' ', '_', $originalFileName);

        // Move the uploaded file to the 'resources/files' directory
        $file->move(public_path('files'), $fileName);

        // Create a new File instance
        $newFile = new FileModel();
        $newFile->fileName = $request->input('fileName');
        $newFile->file = $fileName; // Store the file name in the 'file' column
        $newFile->filePath = 'files/' . $fileName; // Store the file path in the 'filePath' column
        $newFile->fileDescription = $request->input('fileDescription');
        $newFile->save();

        // Redirect back to the file index page with a success message
        return redirect()->route('file.view')->with('success', 'File added successfully');
    }

    public function download($file){
        $file_path = public_path('files/'.$file);
        return response()->download( $file_path);
    }

    public function update($id) {
        $file = FileModel::findOrFail($id);
        return view('file.update', ['file' => $file]);
    }

    public function edit(Request $request, $id) {
        // Validate the incoming request data, including file validation
        $request->validate([
            'fileName' => 'required',
            'file' => 'nullable', // File is not required for editing
            'fileDescription' => 'required',
        ]);

        // Find the file by its ID
        $file = FileModel::findOrFail($id);

        // Update file properties based on the request data
        $file->fileName = $request->input('fileName');
        $file->fileDescription = $request->input('fileDescription');

        // Check if a new file is uploaded
        if ($request->hasFile('file')) {
            $uploadedFile = $request->file('file');
            $originalFileName = $uploadedFile->getClientOriginalName(); // Get the original file name
            $extension = $uploadedFile->getClientOriginalExtension(); // Get the file extension

            // Generate a unique file name with timestamp prefix and original extension
            $fileName = time() . '_' . str_replace(' ', '_', $originalFileName);

            // Move the uploaded file to the 'resources/files' directory
            $uploadedFile->move(public_path('files'), $fileName);

            // Update file properties with new file details
            $file->file = $fileName;
            $file->filePath = 'files/' . $fileName;
        }

        // Save the updated file
        $file->save();

        // Redirect back to the file index page with a success message
        return redirect()->route('file.view')->with('success', 'File updated successfully');
    }

}
