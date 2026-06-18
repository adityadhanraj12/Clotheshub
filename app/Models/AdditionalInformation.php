<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdditionalInformation extends Model
{
    protected $table = 'additional_informations';

    protected $fillable = [
        'product_id',
        'material',
        'style',
        'properties',
        'brand_id',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
