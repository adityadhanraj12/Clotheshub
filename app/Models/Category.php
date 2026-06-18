<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    public function collections()
    {
        return $this->hasMany(Collection::class);
    }

    public function products()
    {
        return $this->hasManyThrough(
            Product::class,
            Collection::class
        );
    }
}
