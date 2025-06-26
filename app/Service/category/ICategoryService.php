<?php

namespace App\Service\category;
use App\Repository\CategoryRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;


interface ICategoryService
{
    public function GetAllCategoryPaginate();

    public function postAddCategory($data);
    public function GetCategoryById($id);
    public function UpdateCategoryById($id, $data);
    public function DeleteCategoryById($id);
    public function GetCategoryBySlug($slug);
    public function GetCategoryByName($name);
    public function GetCategoryByIdWithProduct($id);
    public function GetCategoryByIdWithProductPaginate($id, $paginate = 10);
    public function GetCategoryByIdWithProductPaginateAndSort($id, $paginate = 10, $sort = 'created_at', $order = 'desc');
    public function GetCategoryByIdWithProductPaginateAndSortAndFilter($id, $paginate = 10, $sort = 'created_at', $order = 'desc', $filter = []);
}
