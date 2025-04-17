<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'brand_id', 'product_name', 'logo', 'description',
        'price', 'quantity', 'status'
    ];

    public function brand() {
        return $this->belongsTo(Brand::class);
    }
}
