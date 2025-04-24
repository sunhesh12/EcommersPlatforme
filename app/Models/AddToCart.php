<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddToCart extends Model
{
    protected $table = 'add_to_cart';
    protected $fillable = ['user_id', 'product_id', 'quantity'];
}
