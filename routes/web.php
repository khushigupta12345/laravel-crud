<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product',[ProductController::class, 'index'])->name ('product.index'); 
Route::get('/product/create',[ProductController::class, 'create'])->name ('product.create'); 
Route::post('/product-create',[ProductController::class, 'store'])->name ('product.store'); 
Route::get('/product/{product}/edit',[ProductController::class, 'edit'])->name ('product.edit'); 
Route::any('/product/{product}/update',[ProductController::class, 'update'])->name ('product.update'); 
Route::delete('/product/{product}/destroy',[ProductController::class, 'destroy'])->name ('product.destroy'); 
// we r going to create this function(create,store,edit,update,destoy) in productcontroller