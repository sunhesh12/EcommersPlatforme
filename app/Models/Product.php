<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'brand_id', 'product_name', 'logo', 'description',
        'price', 'old_price', 'quantity', 'status',
        'model', 'processor', 'graphics', 'memory',
        'display', 'storage', 'io_ports', 'os',
        'color', 'warranty'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
