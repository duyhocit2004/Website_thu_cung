<?php

namespace App\Service\product;

interface IproductService {

    public function GetAllProductPaginate();
    public function postAddProduct($data);
    public function GetProductById($id);
    public function UpdateProductById($id,$data);
    public function DeleteProductById($id);

}