<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    public function run()
    {
        Brand::create([
            'name' => 'ASUS',
            'slug' => 'asus',
            'logo' => 'brand_logos/asus.png', // make sure this image exists in storage/public/brand_logos
        ]);

        Brand::create([
            'name' => 'HP',
            'slug' => 'hp',
            'logo' => 'brand_logos/hp.png', // make sure this image exists in storage/public/brand_logos
        ]);
    }
}
