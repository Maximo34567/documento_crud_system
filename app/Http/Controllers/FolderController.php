<?php

namespace App\Http\Controllers;
use App\Models\Folder;

use Illuminate\Http\Request;

class FolderController extends Controller
{
    public function view()
    {
        $folders = Folder::all(); // Fetch all folders from the database
        return view('folder.view', ['folders' => $folders]); // Pass the $folders variable to the view
    }

    public function create() {
        return view ('folder.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'folderName' => 'required|string|max:255',
            'folderDescription' => 'required',
        ]);

        $folder = new Folder();

        $folder->folderName = $request->folderName;
        $folder->folderDescription = $request->folderDescription;

        $folder->save();

        return redirect()->route('folder.view')->with('success', 'Folder created successfully.');
    }

    public function destroy($id) {

        $folder = Folder::findorfail($id);
        $folder->delete();

        return redirect()->route('folder.view')->with('success', 'Folder deleted successfully');
    }

    public function update($id) {
        $folder = Folder::findOrFail($id);
        return view('folder.update', ['folder' => $folder]);
    }

    public function edit(Request $request, $id) {
        // Validate the incoming request data
        $request->validate([
            'folderName' => 'required|string|max:255',
            'folderDescription' => 'required',
        ]);

        // Find the folder to be updated
        $folder = Folder::findOrFail($id);

        // Update the folder with the new data
        $folder->update([
            'folderName' => $request->folderName,
            'folderDescription' => $request->folderDescription,
        ]);

        // Redirect back to the view folder page with a success message
        return redirect()->route('folder.view')->with('success', 'Folder updated successfully.');
    }
}
