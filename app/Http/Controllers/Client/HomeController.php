<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Lấy 4 sản phẩm bán chạy nhất
        $product = Product::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        return view('client.index', compact('product'));
    }
}
