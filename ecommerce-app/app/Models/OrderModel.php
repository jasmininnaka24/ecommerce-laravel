<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    use HasFactory;

    protected $table = 'addToCart';

    protected $fillable = [
        'id',
        'image',
        'product_name',
        'unit_price',
        'quantity',
        'size',
        'user_id',
        'product_id',
    ];
}
