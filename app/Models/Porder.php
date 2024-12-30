<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;


class Porder extends Model
{
    protected $fillable = [
        'customer_id',
        'product_id',
        'qty',
        'time',
        'user_ip'
    ];

    public function product(){
        return $this->belongsTo(Products::class,'product_id');
    }
    use HasFactory;
}
