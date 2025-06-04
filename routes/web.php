<?php

use App\Http\Controllers\admin\ColorController;
use App\Http\Controllers\admin\homeController;
use App\Http\Controllers\admin\productController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\SizeController;
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

Route::get('redirectToFacebook', [AuthController::class, 'redirectToFacebook'])->name('redirectToFacebook');
Route::get('handleFacebookCallback', [AuthController::class, 'handleFacebookCallback']);

Route::get('redirectToBitbucket', [AuthController::class, 'redirectToBitbucket'])->name('redirectToBitbucket');
Route::get('handleBitbucketCallback', [AuthController::class, 'handleBitbucketCallback']);

Route::prefix('admin')->middleware(['auth.admin'])->group(function () {
    Route::get('home', [homeController::class, 'index'])->name('homeAdmin');
    Route::prefix('product')->group(function () {
        Route::get('GetAllProductPaginate', [productController::class, 'GetAllProductPaginate'])->name('GetAllProductPaginate');
        Route::get('FormAddProduct', [productController::class, 'FormAddProduct'])->name('FormAddProduct');
        Route::Post('PostAddProduct', [ProductController::class, 'PostAddProduct'])->name('PostAddProduct');
        Route::get('GetproductById/{id}', [ProductController::class, 'GetproductById'])->name('GetproductById');
        Route::put('UpdateProductById/{id}', [ProductController::class, 'UpdateProductById'])->name('UpdateProductById');
        Route::put('DeleteProductById/{id}', [productController::class, 'DeleteProductById'])->name('DeleteProductById');
    });

    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('create', [UserController::class, 'create'])->name('users.create');
        Route::post('store', [UserController::class, 'store'])->name('users.store');
        Route::get('edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::post('update/{id}', [UserController::class, 'update'])->name('users.update');
        Route::get('delete/{id}', [userController::class, 'destroy'])->name('users.delete');
        Route::post('/deactivate/{id}', [UserController::class, 'deactivate'])->name('users.deactivate');
    });

    Route::prefix('color')->group(function () {
        Route::get('/', [ColorController::class, 'index'])->name('color.index');
        Route::get('create', [ColorController::class, 'create'])->name('color.create');
        Route::post('store', [ColorController::class, 'store'])->name('color.store');
        Route::get('edit/{id}', [ColorController::class, 'edit'])->name('color.edit');
        Route::post('update/{id}', [ColorController::class, 'update'])->name('color.update');
        Route::get('delete/{id}', [ColorController::class, 'destroy'])->name('color.delete');
    });

       Route::prefix('size')->group(function () {
        Route::get('/', [SizeController::class, 'index'])->name('size.index');
        Route::get('create', [SizeController::class, 'create'])->name('size.create');
        Route::post('store', [SizeController::class, 'store'])->name('size.store');
        Route::get('edit/{id}', [SizeController::class, 'edit'])->name('size.edit');
        Route::post('update/{id}', [SizeController::class, 'update'])->name('size.update');
        Route::get('delete/{id}', [SizeController::class, 'destroy'])->name('size.delete');
    });
});
