<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class EUser extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'e_users'; // Define the table name explicitly

    protected $fillable = [
        'name',
        'email',
        'password',
        'accepted_terms',
        'is_admin',
        'profile_picture',
        'phone',
        'address',
        'city',
        'state',
        'country',
        'postal_code',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed', // Laravel 10+ hashing
        'accepted_terms' => 'boolean',
        'is_admin' => 'boolean',
    ];
}

