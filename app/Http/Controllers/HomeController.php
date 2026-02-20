<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        //
        $home=Home::all();
        return response()->json($home,200);
    }

    public function store(Request $request)
    {
        
       $validatedData=$request->validate([
        'main_text'=>'nullable',
        'next_text'=>'nullable',
        'description_text'=>'nullable',
        'complete_project'=>'nullable',
        'saticfy_client'=>'nullable',
        'exp_year'=>'nullable',
        
   ]);
   $home=Home::create($validatedData);
    return response()->json($home,201);
    }

    public function show(int $id)
    {
        $home=Home::find($id);
        return response()->json($home,200);
    }


    public function update(Request $request, int $id)
    {
    $home = Home::findOrFail($id);
    
    $validatedData = $request->validate([
        'main_text'=>'nullable',
        'next_text'=>'nullable',
        'description_text'=>'nullable',
        'complete_project'=>'nullable',
        'saticfy_client'=>'nullable',
        'exp_year'=>'nullable',
    ]);

    // إزالة الحقول الفارغة من البيانات المرسلة
    foreach ($validatedData as $key => $value) {
        if ($value === '' || $value === null) {
            unset($validatedData[$key]); // إزالة الحقل الفارغ
        }
    }

    // تحديث فقط الحقول التي لها قيم
    if (!empty($validatedData)) {
        $home->update($validatedData);
    }
    
    return redirect()->back()->with('success', 'تم التحديث بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $home=Home::find($id);
        $home->delete();
        return response()->json($home,200);

    }



    public function clear($id)
{
    $home = Home::findOrFail($id);
    
    // تفريغ جميع الحقول (جعلها null)
    $home->update([
        'main_text' => null,
        'next_text' => null,
        'description_text' => null,
        // 'complete_project' => null,
        // 'saticfy_client' => null,
        // 'exp_year' => null,
    ]);
    
    return redirect()->back()->with('success', 'تم تفريغ محتوى الصفحة الرئيسية بنجاح');
}
}



