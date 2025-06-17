<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Product\productService;
use App\Service\product\IproductService;

class productController extends Controller
{
    public IproductService $product;
    
    public function __construct(productService $product)
    {
        $this->product = $product;
    }

    public function GetAllProductPaginate()
    {
        return  $this->product->GetAllProductPaginate();
    }

    public function FormAddProduct()
    {
        return view('admin.product.addProduct');
    }

    public function postAddProduct(Request $request)
    {
        return $this->product->postAddProduct($request);
    }

    public function GetProductById($id)
    {
        return $this->product->GetProductById($id);
    }

    public function UpdateProductById(Request $request, $id)
    {
        return $this->product->UpdateProductById($request, $id);
    }

    public function DeleteProductById($id)
    {
        return $this->product->DeleteProductById($id);
    }
}
