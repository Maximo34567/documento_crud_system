<?php

namespace App\Http\Controllers;
use App\Models\Client;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function view()
    {
        $clients = Client::all(); // Fetch all clients from the database
        return view('client.view', ['clients' => $clients]); // Pass the $clients variable to the view
    }

    public function create()
    {
        return view('client.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'clientName' => 'required',
            'clientDescription' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'clientType' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        $client = new Client;
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $client->clientName = $request->clientName;
        $client->image = $imageName;
        $client->clientDescription = $request->clientDescription;
        $client->clientType = $request->clientType;
        $client->username = $request->username;
        $client->password = $request->password;

        $client->save();

        return redirect()->route('client.view')->with('success', 'Client Added Successfully');
    }

    public function destroy($id) {

        $client = Client::findorfail($id);
        $client->delete();

        return redirect()->route('client.view')->with('success', 'Client deleted successfully');
    }

    public function update($id)
    {
        $client = Client::findOrFail($id);
        return view('client.update', compact('client'));
    }

    public function edit(Request $request, $id)
    {
        $validatedData = $request->validate([
            'clientName' => 'required',
            'clientDescription' => 'required',
            'image' => 'sometimes|mimes:jpeg,png,jpg,gif,svg|max:2048', // 'sometimes' allows the image to be optional
            'clientType' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        $client = Client::findOrFail($id);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $client->image = $imageName;
        }

        $client->clientName = $request->clientName;
        $client->clientDescription = $request->clientDescription;
        $client->clientType = $request->clientType;
        $client->username = $request->username;
        $client->password = $request->password;

        $client->save();

        return redirect()->route('client.view')->with('success', 'Client updated successfully.');
    }



}


