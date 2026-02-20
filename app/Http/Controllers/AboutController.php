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
        'story_text'=>'nullable|string',
        'message_text'=>'nullable|string',
        'principle_text'=>'nullable|string',
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
    public function update(Request $request, int $id)
{
    $about = About::findOrFail($id);
    
    $validatedData = $request->validate([
        'about_image' => 'sometimes|nullable',
        'vision_image' => 'sometimes|nullable',
        'vision_text' => 'nullable|string',
        'about_text' => 'nullable|string',
        'story_text' => 'nullable|string',
        'message_text' => 'nullable|string',
        'principle_text' => 'nullable|string',
    ]);

    // إزالة الحقول الفارغة من البيانات المرسلة
    foreach ($validatedData as $key => $value) {
        if ($value === '' || $value === null) {
            unset($validatedData[$key]); // إزالة الحقل الفارغ
        }
    }

    // تحديث فقط الحقول التي لها قيم
    if (!empty($validatedData)) {
        $about->update($validatedData);
    }
    
    return redirect()->back()->with('success', 'تم التحديث بنجاح');
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


    public function clear($id)
{
    $about = About::findOrFail($id);
    
    // تفريغ جميع الحقول
    $about->update([
        'about_text' => null,
        'vision_text' => null,
        'story_text' => null,
        'message_text' => null,
        'principle_text' => null,
        'about_text_en' => null,
        'vision_text_en' => null,
    ]);
    
    return redirect()->back()->with('success', 'تم تفريغ محتوى صفحة من نحن بنجاح');
}
}
