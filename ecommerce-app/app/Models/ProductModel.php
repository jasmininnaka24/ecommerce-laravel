<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'id',
        'product_img',
        'product_category',
        'product_subcategory',
        'product_name',
        'product_size',
        'product_small',
        'product_medium',
        'product_large',
    ];
}
