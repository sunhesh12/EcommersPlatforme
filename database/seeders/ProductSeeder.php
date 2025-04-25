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

        Product::create([
            'brand_id' => 2,
            'product_name' => 'Dell XPS 13 9310',
            'price' => 220000,
            'old_price' => 235000,
            'quantity' => 10,
            'status' => true,
            'model' => 'XPS 13 9310',
            'processor' => 'Intel® Core™ i7-1165G7',
            'graphics' => 'Intel® Iris® Xe Graphics',
            'memory' => '16 GB LPDDR4x',
            'display' => '13.4-inch FHD+ InfinityEdge',
            'storage' => '512GB NVMe SSD',
            'io_ports' => '2x Thunderbolt 4, 1x microSD card reader, 1x 3.5mm jack',
            'os' => 'Windows 11 Pro',
            'color' => 'Platinum Silver',
            'warranty' => '1 Year Premium Support',
        ]);

        Product::create([
            'brand_id' => 3,
            'product_name' => 'HP Spectre x360 14',
            'price' => 210000,
            'old_price' => 225000,
            'quantity' => 12,
            'status' => true,
            'model' => 'Spectre x360 14',
            'processor' => 'Intel® Core™ i7-1165G7',
            'graphics' => 'Intel® Iris® Xe Graphics',
            'memory' => '16 GB LPDDR4x',
            'display' => '13.5-inch 3K2K OLED Touchscreen',
            'storage' => '1TB NVMe SSD',
            'io_ports' => '2x Thunderbolt 4, 1x USB-A, MicroSD card reader',
            'os' => 'Windows 11 Home',
            'color' => 'Nightfall Black',
            'warranty' => '1 Year Warranty',
        ]);

        Product::create([
            'brand_id' => 4,
            'product_name' => 'Lenovo ThinkPad X1 Carbon Gen 9',
            'price' => 230000,
            'old_price' => 245000,
            'quantity' => 8,
            'status' => true,
            'model' => 'X1 Carbon Gen 9',
            'processor' => 'Intel® Core™ i7-1165G7',
            'graphics' => 'Intel® Iris® Xe Graphics',
            'memory' => '16 GB LPDDR4x',
            'display' => '14-inch FHD+ Anti-glare',
            'storage' => '512GB NVMe SSD',
            'io_ports' => '2x Thunderbolt 4, 2x USB-A, HDMI, 3.5mm jack',
            'os' => 'Windows 11 Pro',
            'color' => 'Black',
            'warranty' => '3 Years Warranty',
        ]);

        Product::create([
            'brand_id' => 5,
            'product_name' => 'Acer Swift 3 SF314-511',
            'price' => 145000,
            'old_price' => 155000,
            'quantity' => 20,
            'status' => true,
            'model' => 'SF314-511',
            'processor' => 'Intel® Core™ i5-1135G7',
            'graphics' => 'Intel® Iris® Xe Graphics',
            'memory' => '8 GB LPDDR4x',
            'display' => '14-inch FHD IPS',
            'storage' => '512GB NVMe SSD',
            'io_ports' => '1x USB-C, 2x USB-A, HDMI, 3.5mm jack',
            'os' => 'Windows 11 Home',
            'color' => 'Silver',
            'warranty' => '1 Year Warranty',
        ]);

        Product::create([
            'brand_id' => 6,
            'product_name' => 'Apple MacBook Air M2',
            'price' => 250000,
            'old_price' => 265000,
            'quantity' => 10,
            'status' => true,
            'model' => 'MacBook Air M2',
            'processor' => 'Apple M2 Chip',
            'graphics' => 'Integrated 10-core GPU',
            'memory' => '8 GB Unified Memory',
            'display' => '13.6-inch Liquid Retina',
            'storage' => '512GB SSD',
            'io_ports' => '2x Thunderbolt 3, MagSafe 3, 3.5mm jack',
            'os' => 'macOS Monterey',
            'color' => 'Midnight',
            'warranty' => '1 Year Limited Warranty',
        ]);

        
    }
}
