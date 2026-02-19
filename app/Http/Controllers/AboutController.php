<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about=About::all();
        return response()->json($about,200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
       $validatedData=$request->validate([
        'about_image'=>'nullable',
        'vision_image'=>'nullable',
        'vision_text'=>'string',
        'about_text'=>'string',
        'vision_text_en'=>'nullable|string',
        'about_text_en'=>'nullable|string',
   ]);
   $about=About::create($validatedData);
    return response()->json($about,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $about=About::find($id);
        return response()->json($about,200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,int $id)
    {
        $about=About::findOrFail($id);
        $validatedData=$request->validate([
        'about_image'=>'sometimes|nullable',
        'vision_image'=>'sometimes|nullable',
        'vision_text'=>'sometimes|string',
        'about_text'=>'sometimes|string',
        'story_text'=>'sometimes|string',
        'message_text'=>'sometimes|string',
        'principle_text'=>'sometimes|string',

   ]);
   $about->update($validatedData);
    return response()->json($about,200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $about=About::find($id);
        $about->delete();
        return response()->json($about,200);

    }
}
