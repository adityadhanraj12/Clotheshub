<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable = [
        'size',
    ];

    public $timestamps = false;

    public function prices()
    {
        return $this->hasMany(Price::class);
    }
}