<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            [
                'name' => 'Classic Dermabration Facials',
                'category_id' => 7,
                'price' => 10000
            ],
            [
                'name' => '24 Karat Glow up facials',
                'category_id' => 7,
                'price' => 15000
            ],
            [
                'name' => 'Acne, Hyperpigmentation & High Frequency facials',
                'category_id' => 7,
                'price' => 15000
            ],
            [
                'name' => 'Anti ageing & Face lift facials',
                'category_id' => 7,
                'price' => 25000
            ],
            [
                'name' => 'Microneeding facials',
                'category_id' => 7,
                'price' => 30000
            ],
            [
                'name' => 'Dermaplanning & Microplanning facials',
                'category_id' => 7,
                'price' => 20000
            ],
            [
                'name' => 'Carbon Laser Facials',
                'category_id' => 7,
                'price' => 20000
            ],
            [
                'name' => 'Wrap Pedicure',
                'category_id' => 8,
                'price' => 5000
            ],
            [
                'name' => 'Leg treat, Pedicure & Manicure',
                'category_id' => 8,
                'price' => 10000
            ],
            [
                'name' => 'Jeli Pedi',
                'category_id' => 8,
                'price' => 10000
            ],
            [
                'name' => 'Foot detox & Pedicure',
                'category_id' => 8,
                'price' => 15000
            ],
            [
                'name' => 'Suana/Steambath/Exfoilation',
                'category_id' => 9,
                'price' => 30000
            ],
            [
                'name' => 'Vajacials',
                'category_id' => 9,
                'price' => 15000
            ],
            [
                'name' => 'Brazillian Wax',
                'category_id' => 9,
                'price' => 8000
            ],
            [
                'name' => 'Brazillian Wax & Vajacials',
                'category_id' => 9,
                'price' => 20000
            ],
            [
                'name' => 'Vagina Steaming',
                'category_id' => 9,
                'price' => 5000
            ],
            [
                'name' => 'Teeth Whitening',
                'category_id' => 9,
                'price' => 20000
            ],
            [
                'name' => 'Skin Tag Removal',
                'category_id' => 9,
                'price' => 15000
            ],
            [
                'name' => 'Stretch Mark Removal',
                'category_id' => 9,
                'price' => 30000
            ],
            [
                'name' => 'Laser Vagina Tightening',
                'category_id' => 9,
                'price' => 30000
            ],
            [
                'name' => 'Dark Thigh Reduction',
                'category_id' => 9,
                'price' => 5000
            ],
            [
                'name' => 'Dark Knuckle Reduction',
                'category_id' => 9,
                'price' => 5000
            ],
            [
                'name' => 'Dark Knee Reduction',
                'category_id' => 9,
                'price' => 5000
            ],
            [
                'name' => 'Dark Armpit Reduction',
                'category_id' => 9,
                'price' => 5000
            ],
            [
                'name' => 'Armpit/Chin Wax',
                'category_id' => 9,
                'price' => 5000
            ],
            [
                'name' => 'Sugar Wax',
                'category_id' => 9,
                'price' => 10000
            ]  
        ];

        DB::table('services')->insert($services);
    }
}
