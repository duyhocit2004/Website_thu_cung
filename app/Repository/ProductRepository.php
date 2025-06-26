<?php

namespace App\Repository;

use App\Models\Product;
use Cloudinary\Cloudinary;
use App\Common\Notification;

class ProductRepository
{
    public $cloudinary;
    public $notification;

    public function __construct(Cloudinary $cloudinary, Notification $notification)
    {
        $this->cloudinary = $cloudinary;
        $this->notification = $notification;
    }
    public function GetAllProductPaginate()
    {
        $product = Product::query()->orderByDesc('created_at')->Where('status', 'appear')->paginate(8);
        return  view('admin.product.listProuct', compact('product'));
    }

    public function PostAddProduct($data) {}

    public function GetProductById($data) {}

    public function UpdateProductById($id, $data) {}

    public function DeleteProductById($id)
    {
        $product = Product::query()->findOrFail($id);
        if (!$product) {
            return $this->notification->Error('GetAllProductPaginate', 'Sản phẩm không tồn tại,không thể xóa');
        }
        $product->update([
            'status' => 'hidden'
        ]);

        return $this->notification->Success('GetAllProductPaginate', 'bạn đã xóa sản phẩm thành cong');
    }
}
