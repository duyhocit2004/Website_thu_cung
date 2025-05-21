<?php

namespace App\Service\Product;

use Illuminate\Support\Facades\Auth;
use App\Repository\ProductRepository;


class ProductService implements IproductService{
    public ProductRepository $ProductRepository;
    public function __construct(ProductRepository $ProductRepository){
        $this->ProductRepository=$ProductRepository;
    }
    public function GetAllProductPaginate(){

        $this->notificationRoleAccessUser();
        return $this->ProductRepository->GetAllProductPaginate();
    }
    public function postAddProduct($data){
        $this->notificationRoleAccessUser();
        return $this->ProductRepository->PostAddProduct($data);
    }
    public function GetProductById($data){
        $this->notificationRoleAccessUser();
    }
    public function UpdateProductById($id,$data){
        $this->notificationRoleAccessUser();
    }
    public function DeleteProductById($id){
        $this->notificationRoleAccessUser();
        return $this->ProductRepository->DeleteProductById($id);
    }
    private function notificationRoleAccessUser(){
        $user = Auth::user();
        if(!empty($user) || $user['role'] !== config('contast.Admin')){
            return view('client.index')->with('error','bạn không có quyền truy cập vào trang quản trị');
        }
    }
}