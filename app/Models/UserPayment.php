<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPayment extends Model
{
    protected $fillable = ['euser_id', 'card_number', 'expiry_date', 'cvv'];
}
