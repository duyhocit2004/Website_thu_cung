<?php

use App\Http\Controllers\auth\AuthController;
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
Route::get('/', function () {
    return view('client.index');
})->name('home');
Route::get('formLogin',[AuthController::class,'formLogin'])->name('formLogin');
Route::post('loginUser',[AuthController::class,'login'])->name('loginUser');
Route::get('formLoginAdmin',[AuthController::class,'formLoginAdmin'])->name('formLoginAdmin');
Route::post('loginAdmin',[AuthController::class,'loginAdmin'])->name('loginAdmin');
Route::get('formRegister',[AuthController::class,'formRegister'])->name('formRegister');
Route::post('register',[AuthController::class,'register'])->name('register');
Route::get('formForgotPassword',[AuthController::class,'formForgotPassword'])->name('formForgotPassword');
Route::post('forgotPassword',[AuthController::class,'forgotPassword'])->name('forgotPassword');
Route::get('logout',[AuthController::class,'logout'])->name('logout');