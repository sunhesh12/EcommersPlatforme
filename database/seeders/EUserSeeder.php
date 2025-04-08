<?php 

namespace Database\Seeders;

use App\Models\EUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EUserSeeder extends Seeder
{
    public function run()
    {
        EUser::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
            'accepted_terms' => true,
            'is_admin' => true,
            'phone' => '1234567890',
            'address' => '123 Street',
            'city' => 'Colombo',
            'state' => 'Western',
            'country' => 'Sri Lanka',
            'postal_code' => '10100',
        ]);
    }
}
