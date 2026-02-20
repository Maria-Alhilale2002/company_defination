<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    
//index for all things
public function index()
      {
          $service=Service::all();
          return response()->json($service,200);
      }


//store for storing

public function store(Request $request){

   $validatedData=$request->validate([
        'service_name'=>'required|string|min:5',
        'service_description_web'=>'nullable|string',
        'service_description_app'=>'nullable|string',
        'service_description_marketing'=>'nullable|string',
        'service_image'=>'nullable',
        'service_name_en'=>'string|min:5',
        'service_description_en'=>'nullable|string',
   ]);
   $service=Service::create($validatedData);
    return response()->json($service,201);
}


public function update(Request $request,$service_id){
     $service=Service::findOrFail($service_id);
     $validatedData=$request->validate([
        'service_name'=>'sometimes|string|min:5',
        'service_description_web'=>'nullable|string',
        'service_description_app'=>'nullable|string',
        'service_description_marketing'=>'nullable|string',
        'service_description'=>'sometimes|nullable|string',
        'service_image'=>'sometimes|nullable',
        'service_name_en'=>'sometimes|string|min:5',
        'service_description_en'=>'sometimes|nullable|string',
     ]);
      // إزالة الحقول الفارغة من البيانات المرسلة
    foreach ($validatedData as $key => $value) {
        if ($value === '' || $value === null) {
            unset($validatedData[$key]); // إزالة الحقل الفارغ
        }
    }

    // تحديث فقط الحقول التي لها قيم
    if (!empty($validatedData)) {
        $service->update($validatedData);
    }
    
    return redirect()->back()->with('success', 'تم التحديث بنجاح');
}
   

public function show($service_id){
    $service=Service::find($service_id);
    return response()->json($service,200);
}

public function destroy($id)
{
    $service = Service::findOrFail($id);
    $service->delete();
    
    return redirect()->back()->with('success', 'تم حذف الخدمات بنجاح');
}

public function clear($id)
{
    $service = Service::findOrFail($id);
    
    // حدد الحقول التي تريد تفريغها حسب نموذج الخدمات
    $service->update([
        'service_description_web' => null,
        'service_description_app' => null,
        'service_description_marketing'=> null,
        // أضف باقي الحقول حسب جدول الخدمات
    ]);
    
    return redirect()->back()->with('success', 'تم تفريغ محتوى الخدمات بنجاح');
}
}
