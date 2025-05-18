<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;
    protected $table = 'product_variants';
    protected $fillable = [
        'product_id',
        'color_id',
        'net_weight_id',
        'price',
        'stock',
        'created_at',
        'updated_at'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function color()
    {
        return $this->belongsTo(Color::class);
    }
    public function netWeight()
    {
        return $this->belongsTo(NetWeight::class);
    }
}
