<?php

use App\Http\Controllers\admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\admin\ColorController;
use App\Http\Controllers\admin\homeController;
use App\Http\Controllers\admin\productController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Home1Controller;
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


// routes/web.php
Route::get('/', [Home1Controller::class, 'index']);
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


// Admin Routes
Route::prefix('admin')->middleware(['auth.admin'])->group(function () {
    Route::get('home', [homeController::class, 'index'])->name('homeAdmin');
    Route::prefix('product')->group(function () {
        // Route::get('GetAllProductPaginate', [productController::class, 'GetAllProductPaginate'])->name('GetAllProductPaginate');
        // Route::get('FormAddProduct', [productController::class, 'FormAddProduct'])->name('FormAddProduct');
        // Route::Post('PostAddProduct', [ProductController::class, 'PostAddProduct'])->name('PostAddProduct');
        // Route::get('GetproductById/{id}', [ProductController::class, 'GetproductById'])->name('GetproductById');
        // Route::put('UpdateProductById/{id}', [ProductController::class, 'UpdateProductById'])->name('UpdateProductById');
        // Route::put('DeleteProductById/{id}', [productController::class, 'DeleteProductById'])->name('DeleteProductById');

        Route::get('/', [productController::class, 'index'])->name('product.index');
        Route::get('create', [productController::class, 'create'])->name('product.create');
        Route::post('store', [productController::class, 'store'])->name('product.store');
        Route::get('edit/{id}', [productController::class, 'edit'])->name('product.edit');
        Route::put('update/{id}', [productController::class, 'update'])->name('product.update');
        Route::get('delete/{id}', [productController::class, 'destroy'])->name('product.delete');
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

      Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::get('create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::get('delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
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
        Route::put('update/{id}', [SizeController::class, 'update'])->name('size.update');
        Route::get('delete/{id}', [SizeController::class, 'destroy'])->name('size.delete');
    });
});
