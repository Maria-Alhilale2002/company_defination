<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $product = Product::all();

        return response()->json($product, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validateData = $request->validate([
            'client_id' => 'required',
            'product_name' => 'required|string|min:5',
            'product_description' => 'nullable|string',
            'product_image' => 'nullable',
            'product_name_en' => 'nullable|string',
            'product_description_en' => 'nullable|string',
        ]);
        $product = Product::create($validateData);

        return response()->json($product, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $product_id)
    {
        $product = Product::find($product_id);

        return response()->json($product, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $product_id)
    {
        $product = Product::findOrFail($product_id);
        $validateData = $request->validate([
            'product_name' => 'sometimes|string|min:5',
            'product_description' => 'sometimes|nullable|string',
            'product_image' => 'sometimes|nullable',
            'product_name_en' => 'sometimes|nullable|string',
            'product_description_en' => 'sometimes|nullable|string',
        ]);
        $product->update($validateData);

        return response()->json($product, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $product_id)
    {
        $product = Product::find($product_id);
        $product->delete();

        return response()->json($product, 200);
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

    // دوال الواجهة الإدارية
    public function adminIndex()
    {
        $products = Product::with('client')->orderBy('created_at', 'desc')->get();

        return view('admin.products.index', compact('products'));
    }

    public function adminCreate()
    {
        return view('admin.products.create');
    }

    public function adminStore(Request $request)
    {
        $request->validate([
            'service_type' => 'required|in:website,app,digital_marketing',
            'product_name' => 'required|string|min:3|max:255',
            'product_description' => 'required|string|min:10',
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'service_type.required' => 'نوع الخدمة مطلوب',
            'service_type.in' => 'نوع الخدمة غير صحيح',
            'product_name.required' => 'اسم المنتج مطلوب',
            'product_name.min' => 'اسم المنتج يجب أن يكون 3 أحرف على الأقل',
            'product_description.required' => 'وصف المنتج مطلوب',
            'product_description.min' => 'وصف المنتج يجب أن يكون 10 أحرف على الأقل',
            'product_image.image' => 'يجب أن يكون الملف صورة',
            'product_image.mimes' => 'نوع الصورة يجب أن يكون: jpeg, png, jpg, gif',
            'product_image.max' => 'حجم الصورة يجب أن يكون أقل من 2MB',
        ]);

        $data = [
            'client_id' => auth('client')->user()->client_id,
            'service_type' => $request->service_type,
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
        ];

        // رفع الصورة
        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads/products'), $imageName);
            $data['product_image'] = 'uploads/products/'.$imageName;
        }

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'تم إضافة المنتج بنجاح');
    }

    public function adminEdit($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.products.edit', compact('product'));
    }

    public function adminUpdate(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'service_type' => 'required|in:website,app,digital_marketing',
            'product_name' => 'required|string|min:3|max:255',
            'product_description' => 'required|string|min:10',
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'service_type.required' => 'نوع الخدمة مطلوب',
            'service_type.in' => 'نوع الخدمة غير صحيح',
            'product_name.required' => 'اسم المنتج مطلوب',
            'product_name.min' => 'اسم المنتج يجب أن يكون 3 أحرف على الأقل',
            'product_description.required' => 'وصف المنتج مطلوب',
            'product_description.min' => 'وصف المنتج يجب أن يكون 10 أحرف على الأقل',
            'product_image.image' => 'يجب أن يكون الملف صورة',
            'product_image.mimes' => 'نوع الصورة يجب أن يكون: jpeg, png, jpg, gif',
            'product_image.max' => 'حجم الصورة يجب أن يكون أقل من 2MB',
        ]);

        $data = [
            'service_type' => $request->service_type,
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
        ];

        // رفع الصورة الجديدة
        if ($request->hasFile('product_image')) {
            // حذف الصورة القديمة
            if ($product->product_image && file_exists(public_path($product->product_image))) {
                unlink(public_path($product->product_image));
            }

            $image = $request->file('product_image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads/products'), $imageName);
            $data['product_image'] = 'uploads/products/'.$imageName;
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'تم تحديث المنتج بنجاح');
    }

    public function adminDestroy($id)
    {
        $product = Product::findOrFail($id);

        // حذف الصورة من الخادم
        if ($product->product_image && file_exists(public_path($product->product_image))) {
            unlink(public_path($product->product_image));
        }

        $product->delete();

        return redirect()->back()->with('success', 'تم حذف المنتج بنجاح');
    }
}
