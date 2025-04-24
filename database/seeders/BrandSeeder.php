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

        Brand::create([
            'name' => 'Dell',
            'slug' => 'dell',
            'logo' => 'brand_logos/dell.png',
        ]);
        
        
        Brand::create([
            'name' => 'Lenovo',
            'slug' => 'lenovo',
            'logo' => 'brand_logos/lenovo.png',
        ]);
        
        Brand::create([
            'name' => 'Acer',
            'slug' => 'acer',
            'logo' => 'brand_logos/acer.png',
        ]);
        
        Brand::create([
            'name' => 'Apple',
            'slug' => 'apple',
            'logo' => 'brand_logos/apple.png',
        ]);
        
        Brand::create([
            'name' => 'Microsoft',
            'slug' => 'microsoft',
            'logo' => 'brand_logos/microsoft.png',
        ]);
        
        Brand::create([
            'name' => 'MSI',
            'slug' => 'msi',
            'logo' => 'brand_logos/msi.png',
        ]);
        
        Brand::create([
            'name' => 'Razer',
            'slug' => 'razer',
            'logo' => 'brand_logos/razer.png',
        ]);
        
        Brand::create([
            'name' => 'Samsung',
            'slug' => 'samsung',
            'logo' => 'brand_logos/samsung.png',
        ]);
        
        Brand::create([
            'name' => 'Huawei',
            'slug' => 'huawei',
            'logo' => 'brand_logos/huawei.png',
        ]);
        
        Brand::create([
            'name' => 'Gigabyte',
            'slug' => 'gigabyte',
            'logo' => 'brand_logos/gigabyte.png',
        ]);
        
        Brand::create([
            'name' => 'Toshiba',
            'slug' => 'toshiba',
            'logo' => 'brand_logos/toshiba.png',
        ]);
        
        Brand::create([
            'name' => 'Panasonic',
            'slug' => 'panasonic',
            'logo' => 'brand_logos/panasonic.png',
        ]);
        
        Brand::create([
            'name' => 'LG',
            'slug' => 'lg',
            'logo' => 'brand_logos/lg.png',
        ]);
        
        Brand::create([
            'name' => 'Fujitsu',
            'slug' => 'fujitsu',
            'logo' => 'brand_logos/fujitsu.png',
        ]);
        
        Brand::create([
            'name' => 'VAIO',
            'slug' => 'vaio',
            'logo' => 'brand_logos/vaio.png',
        ]);
        
        Brand::create([
            'name' => 'Xiaomi',
            'slug' => 'xiaomi',
            'logo' => 'brand_logos/xiaomi.png',
        ]);
        
        Brand::create([
            'name' => 'Chuwi',
            'slug' => 'chuwi',
            'logo' => 'brand_logos/chuwi.png',
        ]);
        
        Brand::create([
            'name' => 'Realme',
            'slug' => 'realme',
            'logo' => 'brand_logos/realme.png',
        ]);
    }
}
