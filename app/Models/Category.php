<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $fillable = [
        'name',
        'description',
        'created_at',
        'updated_at'
    ];
    public function productt()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
