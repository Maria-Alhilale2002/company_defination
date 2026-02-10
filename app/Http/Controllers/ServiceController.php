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
        'service_description'=>'nullable|string',
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
        'service_description'=>'sometimes|nullable|string',
        'service_image'=>'sometimes|nullable',
        'service_name_en'=>'sometimes|string|min:5',
        'service_description_en'=>'sometimes|nullable|string',
     ]);
     $service->update($validatedData);
     return response()->json($service,200);
}
   

public function show($service_id){
    $service=Service::find($service_id);
    return response()->json($service,200);
}

public function destroy($service_id){
        $service=Service::find($service_id);
        $service->delete();
        return response()-> json(null,204);//204 for deleting
    }


}
