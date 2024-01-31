<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\userController;
use App\Models\Service;
use Illuminate\Support\Facades\Route;

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

Route::get('/test', function () {
    return view('welcome');
});

Route::get('/service', [ServiceController::class, 'index'])->name('service.index');
Route::get('/service/create',[ServiceController::class,'create'])->name('service.create');
Route::get('/service/{post}/update',[ServiceController::class,'update'])->name('service.update');
Route::get('/service/{post}',[ServiceController::class,'show'])->name('service.show');
Route::post('/service',[ServiceController::class,'store'])->name('service.store');
Route::delete('/service/{post}',[ServiceController::class,'delete'])->name('service.destroy');
Route::put('/service/{post}',[ServiceController::class,'modify'])->name('service.modify');

Route::get('/register',[userController::class,'create'])->name('register.create');
Route::post('/register',[userController::class,'store'])->name('register.store');
Route::get('/login',[userController::class,'index'])->name('login.create');
Route::post('/login',[userController::class,'login'])->name('login.store');


