<?php

use App\Http\Controllers\admin\homeController;
use App\Http\Controllers\admin\UserController;
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
Route::get('formLogin', [AuthController::class, 'formLogin'])->name('formLogin');
Route::post('loginUser', [AuthController::class, 'login'])->name('loginUser');
Route::get('formLoginAdmin', [AuthController::class, 'formLoginAdmin'])->name('formLoginAdmin');
Route::post('loginAdmin', [AuthController::class, 'loginAdmin'])->name('loginAdmin');
Route::get('formRegister', [AuthController::class, 'formRegister'])->name('formRegister');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::get('formForgotPassword', [AuthController::class, 'formForgotPassword'])->name('formForgotPassword');
Route::post('forgotPassword', [AuthController::class, 'forgotPassword'])->name('forgotPassword');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('redirectToGoogle', [AuthController::class, 'redirectToGoogle'])->name('redirectToGoogle');
Route::get('handleGoogleCallback', [AuthController::class, 'handleGoogleCallback']);


Route::prefix('admin')->middleware(['auth.admin'])->group(function () {

    Route::prefix('dashbroad')->group(function () {
        Route::get('/', [homeController::class, 'index'])->name('homeAdmin');
    });

    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('create', [UserController::class, 'create'])->name('users.create');
        Route::post('store', [UserController::class, 'store'])->name('users.store');
        Route::get('edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::post('update/{id}', [UserController::class, 'update'])->name('users.update');
        Route::get('delete/{id}', [UserController::class, 'destroy'])->name('users.delete');
    });
});
