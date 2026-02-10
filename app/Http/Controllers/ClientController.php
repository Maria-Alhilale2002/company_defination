<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    //index for all things
    public function index(){
        $client=Client::all();
        return response()->json($client,200);//200 for success
    }

    //store for storing
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'client_name'=>'required|string|min:5',
            'client_email'=>'required|string',
            'client_password'=>'required|string|min:3',
            'client_logo'=>'nullable|string',
            'client_feature'=>'nullable|string',
            'client_name_en'=>'nullable|string',
            'client_feature_en'=>'nullable|string',

        ]);
        $client=Client::create($validatedData);
        return response()->json($client,201);// 201 create new thing
    }

    //update for editing
    public function update(Request $request, $client_id){
             $client=Client::findOrFail($client_id);
             $client->update($request->all());
             return response()->json($client,200);
    }

    //show information
    public function show($client_id){
        $client=Client::find($client_id);
        return response()->json($client,200);
    }

    //delete information
    public function destroy($client_id){
        $client=Client::find($client_id);
        $client->delete();
        return response()-> json(null,204);//204 for deleting
    }

}
