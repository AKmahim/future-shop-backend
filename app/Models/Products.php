<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    

    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_img',
        'product_price',
        'product_old_price',
        'product_details',
        'product_category',
        'feature'
    ];
}
