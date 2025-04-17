<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'brand_id' => 1,
            'product_name' => 'Asus VivoBook R1504VA-BQ922',
            'price' => 152500,
            'old_price' => 165000,
            'quantity' => 10,
            'status' => true,
            'model' => 'Asus VivoBook R1504VA-BQ922',
            'processor' => 'Intel®Core™ i3-1315U Processor',
            'graphics' => 'Intel® UHD Graphics',
            'memory' => '8 GB DDR4',
            'display' => '15.6-inch FHD, 60Hz, Anti-glare',
            'storage' => '512GB NVMe SSD',
            'io_ports' => '1x USB 2.0, 2x USB 3.2, 1x Type-C, HDMI, Audio Jack',
            'os' => 'DOS',
            'color' => 'Quiet Blue',
            'warranty' => '1 Year Warranty + 2 Years Service Warranty',
        ]);
    }
}
