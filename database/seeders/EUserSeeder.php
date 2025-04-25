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
            'email' => 'admin01@example.com',
            'password' => Hash::make('password123'),
            'accepted_terms' => true,
            'is_admin' => true,
            'profile_picture' => 'default.png', // Assuming you have a default profile picture
            'phone' => '1234567890',
            'address' => '123 Street',
            'city' => 'Colombo',
            'state' => 'Western',
            'country' => 'Sri Lanka',
            'postal_code' => '10100',
        ]);

        EUser::create([
            'name' => 'Nimal Perera',
            'email' => 'nimal.perera@example.com',
            'password' => Hash::make('password123'),
            'accepted_terms' => true,
            'is_admin' => false,
            'profile_picture' => 'default.png', 
            'phone' => '0711111111',
            'address' => '10 Temple Road',
            'city' => 'Kandy',
            'state' => 'Central',
            'country' => 'Sri Lanka',
            'postal_code' => '20000',
        ]);
    
        EUser::create([
            'name' => 'Sunethra Silva',
            'email' => 'sunethra.silva@example.com',
            'password' => Hash::make('password123'),
            'accepted_terms' => true,
            'is_admin' => false,
            'profile_picture' => 'default.png', 
            'phone' => '0722222222',
            'address' => '20 Lake View',
            'city' => 'Galle',
            'state' => 'Southern',
            'country' => 'Sri Lanka',
            'postal_code' => '80000',
        ]);
    
        EUser::create([
            'name' => 'Kamal Jayasinghe',
            'email' => 'kamal.jayasinghe@example.com',
            'password' => Hash::make('password123'),
            'accepted_terms' => true,
            'is_admin' => false,
            'profile_picture' => 'default.png', 
            'phone' => '0733333333',
            'address' => '45 Flower Street',
            'city' => 'Kurunegala',
            'state' => 'North Western',
            'country' => 'Sri Lanka',
            'postal_code' => '60000',
        ]);
    
        EUser::create([
            'name' => 'Tharushi Dissanayake',
            'email' => 'tharushi.dissanayake@example.com',
            'password' => Hash::make('password123'),
            'accepted_terms' => true,
            'is_admin' => false,
            'profile_picture' => 'default.png', 
            'phone' => '0744444444',
            'address' => '88 Hill Side',
            'city' => 'Matale',
            'state' => 'Central',
            'country' => 'Sri Lanka',
            'postal_code' => '21000',
        ]);
    
        EUser::create([
            'name' => 'Ruwan Fernando',
            'email' => 'ruwan.fernando@example.com',
            'password' => Hash::make('password123'),
            'accepted_terms' => true,
            'is_admin' => false,
            'profile_picture' => 'default.png', 
            'phone' => '0755555555',
            'address' => '7 Main Street',
            'city' => 'Negombo',
            'state' => 'Western',
            'country' => 'Sri Lanka',
            'postal_code' => '11500',
        ]);
    
        EUser::create([
            'name' => 'Nadeesha Wijeratne',
            'email' => 'nadeesha.wijeratne@example.com',
            'password' => Hash::make('password123'),
            'accepted_terms' => true,
            'is_admin' => false,
            'profile_picture' => 'default.png', 
            'phone' => '0766666666',
            'address' => '33 Palm Grove',
            'city' => 'Gampaha',
            'state' => 'Western',
            'country' => 'Sri Lanka',
            'postal_code' => '11000',
        ]);
    
        EUser::create([
            'name' => 'Isuru Madushan',
            'email' => 'isuru.madushan@example.com',
            'password' => Hash::make('password123'),
            'accepted_terms' => true,
            'is_admin' => false,
            'profile_picture' => 'default.png', 
            'phone' => '0777777777',
            'address' => '12 Sea Road',
            'city' => 'Trincomalee',
            'state' => 'Eastern',
            'country' => 'Sri Lanka',
            'postal_code' => '31000',
        ]);
    
        EUser::create([
            'name' => 'Dilani Rathnayake',
            'email' => 'dilani.rathnayake@example.com',
            'password' => Hash::make('password123'),
            'accepted_terms' => true,
            'is_admin' => false,
            'profile_picture' => 'default.png', 
            'phone' => '0788888888',
            'address' => '51 Lotus Park',
            'city' => 'Ratnapura',
            'state' => 'Sabaragamuwa',
            'country' => 'Sri Lanka',
            'postal_code' => '70000',
        ]);
    
        EUser::create([
            'name' => 'Chathura Senanayake',
            'email' => 'chathura.senanayake@example.com',
            'password' => Hash::make('password123'),
            'accepted_terms' => true,
            'is_admin' => false,
            'profile_picture' => 'default.png', 
            'phone' => '0799999999',
            'address' => '99 Green Hills',
            'city' => 'Anuradhapura',
            'state' => 'North Central',
            'country' => 'Sri Lanka',
            'postal_code' => '50000',
        ]);
    
        EUser::create([
            'name' => 'Hiruni Bandara',
            'email' => 'hiruni.bandara@example.com',
            'password' => Hash::make('password123'),
            'accepted_terms' => true,
            'is_admin' => false,
            'profile_picture' => 'default.png', 
            'phone' => '0700000000',
            'address' => '65 Rose Lane',
            'city' => 'Badulla',
            'state' => 'Uva',
            'country' => 'Sri Lanka',
            'postal_code' => '90000',
        ]);
    }
}
