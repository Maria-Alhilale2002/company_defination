<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact=Contact::all();
        return response()->json($contact,200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
        'name'=>'required|min:5',
        'email'=>'required',
        'subject'=>'string',
        'message'=>'string',
        'name_en'=>'nullable|string',
        'subject_en'=>'nullable|string',
        'message_en'=>'nullable|string',
   ]);
   $contact=Contact::create($validatedData);
    return response()->json($contact,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $contact=Contact::find($id);
         return response()->json($contact,200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $contact=Contact::findOrFail($id);
        $validatedData=$request->validate([
        'name'=>'sometimes|required|min:5',
        'email'=>'sometimes|required',
        'subject'=>'sometimes|string',
        'message'=>'sometimes|string',
        'name_en'=>'sometimes|nullable|string',
        'subject_en'=>'sometimes|nullable|string',
        'message_en'=>'sometimes|nullable|string',
   ]);
   $contact->update($validatedData);
    return response()->json($contact,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $contact=Contact::find($id);
        $contact->delete();
        return response()-> json(null,204);//204 for deleting
    }
}
