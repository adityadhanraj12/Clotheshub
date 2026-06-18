<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'collection_id',
        'brand_id',
        'name',
        'description',
    ];
    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function prices()
    {
        return $this->hasMany(Price::class);
    }
    public function additionalInformation()
    {
        return $this->hasOne(AdditionalInformation::class, 'product_id');
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}


