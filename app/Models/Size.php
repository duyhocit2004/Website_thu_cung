<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $table = 'size';

    protected $fillable = [
        'name',
        'created_at',
        'updated_at'
    ];

}
