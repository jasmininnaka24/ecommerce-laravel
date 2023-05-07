<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionModel extends Model
{
    use HasFactory;
    
    protected $table = 'transactions';

    protected $fillable = [
        'id',
        'image',
        'user_id',
        'product_id',
        'product_name',
        'unit_price',
        'quantity',
        'total_amount',
        'reference_number',
    ];
}
