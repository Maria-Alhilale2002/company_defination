<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AboutController;


// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/products', [PageController::class, 'products'])->name('products');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');


Route::get('/edit_home', function () {
    return view('edit_home');
});
Route::put('/home/{id}', [HomeController::class, 'update'])->name('home.update');

////////////////////////////////////////////////////////////////////

Route::get('/edit_services', function () {
    return view('edit_services');
});
Route::put('/services/{id}', [ServiceController::class, 'update'])->name('services.update');


///////////////////////////////////////////////////////////////////

Route::get('/edit_about', function () {
    return view('edit_about');
});
Route::put('/about/{id}', [AboutController::class, 'update'])->name('about.update');

//////////////////////////////////////////////////////////////////

// Routes للتفريغ (وليس الحذف)
Route::post('/home/clear/{id}', [HomeController::class, 'clear'])->name('home.clear');
Route::post('/services/clear/{id}', [ServiceController::class, 'clear'])->name('services.clear');
Route::post('/products/clear/{id}', [ProductController::class, 'clear'])->name('products.clear');
Route::post('/about/clear/{id}', [AboutController::class, 'clear'])->name('about.clear');

////////////////////////////////////////////////////////////////////

Route::get('/welcome', function () {
    return view('admin');
});

Route::post('/send', action: [ContactController::class,'store'])->name('send');