<?php

namespace App\Http\Controllers;
use App\Models\Roles;

use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function view()
    {
        $roless = roles::all(); // Fetch all roless from the database
        return view('roles.view', ['roless' => $roless]); // Pass the $roless variable to the view
    }

    public function create() {
        return view ('roles.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'rolesName' => 'required|string|max:255',
            'rolesDescription' => 'required',
        ]);

        $roles = new roles();

        $roles->rolesName = $request->rolesName;
        $roles->rolesDescription = $request->rolesDescription;

        $roles->save();

        return redirect()->route('roles.view')->with('success', 'Roles created successfully.');
    }

    public function destroy($id) {

        $roles = roles::findorfail($id);
        $roles->delete();

        return redirect()->route('roles.view')->with('success', 'Roles deleted successfully');
    }

    public function update($id) {
        $roles = roles::findOrFail($id);
        return view('roles.update', ['roles' => $roles]);
    }

    public function edit(Request $request, $id) {
        // Validate the incoming request data
        $request->validate([
            'rolesName' => 'required|string|max:255',
            'rolesDescription' => 'required',
        ]);

        // Find the roles to be updated
        $roles = roles::findOrFail($id);

        // Update the roles with the new data
        $roles->update([
            'rolesName' => $request->rolesName,
            'rolesDescription' => $request->rolesDescription,
        ]);

        // Redirect back to the view roles page with a success message
        return redirect()->route('roles.view')->with('success', 'Roles updated successfully.');
    }
}
