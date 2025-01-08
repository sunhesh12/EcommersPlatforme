<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            [
                'brandName' => 'Apple',
                'brandLogo' => 'logos/apple.png', // Example logo path
                'brandDescription' => 'Premium laptops known for macOS and high performance.',
            ],
            [
                'brandName' => 'Asus',
                'brandLogo' => 'logos/asus.png',
                'brandDescription' => 'Affordable yet powerful laptops for gaming and productivity.',
            ],
            [
                'brandName' => 'Dell',
                'brandLogo' => 'logos/dell.png',
                'brandDescription' => 'Reliable laptops for business and personal use.',
            ],
            [
                'brandName' => 'HP',
                'brandLogo' => 'logos/hp.png',
                'brandDescription' => 'Versatile laptops with sleek designs and durability.',
            ],
            [
                'brandName' => 'Lenovo',
                'brandLogo' => 'logos/lenovo.png',
                'brandDescription' => 'Innovative laptops with a wide range of features.',
            ],
            [
                'brandName' => 'Acer',
                'brandLogo' => 'logos/acer.png',
                'brandDescription' => 'Budget-friendly laptops with good performance.',
            ],
            [
                'brandName' => 'MSI',
                'brandLogo' => 'logos/msi.png',
                'brandDescription' => 'Top-tier gaming laptops for hardcore gamers.',
            ],
            [
                'brandName' => 'Samsung',
                'brandLogo' => 'logos/samsung.png',
                'brandDescription' => 'Stylish laptops with great displays and portability.',
            ],
            [
                'brandName' => 'Microsoft',
                'brandLogo' => 'logos/microsoft.png',
                'brandDescription' => 'Surface laptops for premium productivity experiences.',
            ],
            [
                'brandName' => 'Razer',
                'brandLogo' => 'logos/razer.png',
                'brandDescription' => 'High-performance laptops for gamers and creators.',
            ],
        ];

        foreach ($brands as $brand) {
            Brand::create($brand);
        }

    }
}
