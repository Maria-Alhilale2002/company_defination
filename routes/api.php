<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServiceController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('clients',[ClientController::class,'index']);
Route::post('clients',[ClientController::class,'store']);
Route::put('clients/{client_id}',[ClientController::class,'update']);
Route::get('clients/{client_id}',[ClientController::class,'show']);
Route::delete('clients/{client_id}',[ClientController::class,'destroy']);


Route::get('services',[ServiceController::class,'index']);
Route::post('services',[ServiceController::class,'store']);
Route::put('services/{services_id}',[ServiceController::class,'update']);
Route::get('services/{services_id}',[ServiceController::class,'show']);
Route::delete('services/{services_id}',[ServiceController::class,'destroy']);

Route::apiResource('products',ProductController::class);
Route::apiResource('abouts',AboutController::class);
Route::apiResource('contacts',ContactController::class);
