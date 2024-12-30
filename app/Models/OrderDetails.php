<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $fillable = [
        'customer_name',
        'customer_phone',
        'customer_address',
        'order_note',
        'payment_method_cash',
        'payment_method_bkash',
        'order_status',
        'user_ip',
        'time'
    ];
    use HasFactory;
}
