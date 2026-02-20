<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $product=Product::all();
        return response()->json($product,200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validateData=$request->validate([
            'client_id'=>'required',
            'product_name'=>'required|string|min:5',
            'product_description'=>'nullable|string',
            'product_image'=>'nullable',
            'product_name_en'=>'nullable|string',
            'product_description_en'=>'nullable|string',
        ]);
        $product=Product::create($validateData);
        return response()->json($product,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $product_id)
    {
         $product=Product::find($product_id);
         return response()->json($product,200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $product_id)
    {
        $product=Product::findOrFail($product_id);
        $validateData=$request->validate([
            'product_name'=>'sometimes|string|min:5',
            'product_description'=>'sometimes|nullable|string',
            'product_image'=>'sometimes|nullable',
            'product_name_en'=>'sometimes|nullable|string',
            'product_description_en'=>'sometimes|nullable|string',
        ]);
         $product->update($validateData);
        return response()->json($product,201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $product_id)
    {
        $product=Product::find($product_id);
        $product->delete();
        return response()->json($product,200);
    }

    public function clear($id)
{
    $product = Product::findOrFail($id);
    
    // قم بتفريغ الحقول حسب جدول المنتجات لديك
    $product->update([
        'product_name' => null,
        'product_description' => null,
        // أضف باقي الحقول التي تريد تفريغها
    ]);
    
    return redirect()->back()->with('success', 'تم تفريغ محتوى المنتجات بنجاح');
}
}
