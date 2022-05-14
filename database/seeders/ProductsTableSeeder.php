<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Estrogen',
                'category_id' => 1,
                'price' => 15000,
                'stock' => 0
            ],
            [
                'name' => 'Magicass mini(100ml)',
                'category_id' => 1,
                'price' => 8000,
                'stock' => 0
            ],
            [
                'name' => 'Migicass midi(250ml)',
                'category_id' => 1,
                'price' => 15000,
                'stock' => 0
            ],
            [
                'name' => 'Butt Syrup',
                'category_id' => 1,
                'price' => 15000,
                'stock' => 0
            ],
            [
                'name' => 'Butt Pill',
                'category_id' => 1,
                'price' => 15000,
                'stock' => 0
            ],
            [
                'name' => 'Butt Scrub',
                'category_id' => 1,
                'price' => 5000,
                'stock' => 0
            ],
            [
                'name' => 'Tommy Reduction Pill',
                'category_id' => 2,
                'price' => 10000,
                'stock' => 0
            ],
            [
                'name' => 'Body Reduction Pill',
                'category_id' => 2,
                'price' => 10000,
                'stock' => 0
            ],
            [
                'name' => 'Weight Gain Syrup',
                'category_id' => 3,
                'price' => 10000,
                'stock' => 0
            ],
            [
                'name' => 'Orange Peeling Lotion',
                'category_id' => 4,
                'price' => 5000,
                'stock' => 0
            ],
            [
                'name' => 'Face Serum',
                'category_id' => 4,
                'price' => 3000,
                'stock' => 0
            ],
            [
                'name' => 'Boobs Firming Oil',
                'category_id' => 5,
                'price' => 10000,
                'stock' => 0
            ],
            [
                'name' => 'Boobs Enlargement Pill',
                'category_id' => 5,
                'price' => 10000,
                'stock' => 0
            ],
            [
                'name' => 'Rency Secret',
                'category_id' => 6,
                'price' => 15000,
                'stock' => 0
            ],
            [
                'name' => 'Curse Breaker',
                'category_id' => 6,
                'price' => 15000,
                'stock' => 0
            ],
            [
                'name' => 'Mind Control',
                'category_id' => 6,
                'price' => 10000,
                'stock' => 0
            ],
            [
                'name' => 'Blue Eye(protection)',
                'category_id' => 6,
                'price' => 5000,
                'stock' => 0
            ],
            [
                'name' => 'Business booster(Soap, Oil, Crystal)',
                'category_id' => 6,
                'price' => 20000,
                'stock' => 0
            ],
            [
                'name' => 'Fortified Waist Bead',
                'category_id' => 6,
                'price' => 10000,
                'stock' => 0
            ],
            [
                'name' => 'Pussy Tightener',
                'category_id' => 6,
                'price' => 10000,
                'stock' => 0
            ],
            [
                'name' => 'Favor & Attraction',
                'category_id' => 6,
                'price' => 15000,
                'stock' => 0
            ],
            [
                'name' => 'Road Opener',
                'category_id' => 6,
                'price' => 15000,
                'stock' => 0
            ],
            [
                'name' => 'Money Oil',
                'category_id' => 6,
                'price' => 10000,
                'stock' => 0
            ],
            [
                'name' => 'Sweet Memory Pussy (Omega stay with me)',
                'category_id' => 6,
                'price' => 10000,
                'stock' => 0
            ],
            [
                'name' => 'Pussy Sweetner',
                'category_id' => 6,
                'price' => 10000,
                'stock' => 0
            ],
            [
                'name' => 'Love Soap',
                'category_id' => 6,
                'price' => 5000,
                'stock' => 0
            ],
            [
                'name' => 'Love Oil',
                'category_id' => 6,
                'price' => 10000,
                'stock' => 0
            ],
            [
                'name' => 'Wealth Crystal',
                'category_id' => 6,
                'price' => 3000,
                'stock' => 0
            ],
            [
                'name' => 'Special Package (Consultation required)',
                'category_id' => 6,
                'price' => 40000,
                'stock' => 0
            ]     
        ];
        
        DB::table('products')->insert($products);
    }
}
