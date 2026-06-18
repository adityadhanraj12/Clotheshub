<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_id',
        'user_id',
        'status',
        'total_price',
        'delivery_method',
        'payment_method',
        'user_invoice_address',
        'user_shipping_address',
    ];
    protected $casts = [
        'user_invoice_address' => 'array',
        'user_shipping_address' => 'array',
    ];
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
