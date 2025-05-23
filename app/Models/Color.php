<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $table = 'colors';
    protected $fillable = [
        'name',
        'created_at',
        'updated_at'
    ];
    public function productVariant()
    {
        return $this->hasMany(ProductVariant::class, 'color_id', 'id');
    }
}
