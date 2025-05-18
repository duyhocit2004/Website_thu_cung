<?php

namespace App\Repository;

use App\Models\User;

use App\Providers\AppServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class AuthRepository
{
    public function __construct()
    {
        //
    }

    public function login($request)
    {
        $credentials = $request->only('email', 'password');
        // dd($credentials);
        // $data = [
        //     'email' => 'hoangduy200456@gmail.com',
        //     'password' => 12345678,
        // ];
        if (Auth::attempt($credentials)) {
            // dd(Auth::user());
            if (Auth::user()->role ===  config('contast.User')) {
                return redirect()->route('home')->with('success', 'Bạn đã đăng nhập thành công');
            } else {
                Auth::logout(); // Không đúng quyền
                return redirect()->route('formLogin')->with('error', 'Tài khoản không có quyền truy cập');
            }
        }

        return redirect()->route('formLogin')->with('error', 'Tài khoản hoặc mật khẩu bị sai');

    }
    public function loginAdmin($request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role === config('contast.Admin')) {
                return redirect('admin/product')->with('success', 'Bạn đã đăng nhập thành công');
            } else {
                Auth::logout(); // Không đúng quyền
                return redirect()->route('formLoginAdmin')->with('error', 'Tài khoản không có quyền truy cập');
            }
        }
    }
    public function register($data)
    {

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],

        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')->with('success', 'Bạn đã đăng xuất thành công');
    }

}