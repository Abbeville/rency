<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'enhancement',
                'type' => 'product'
            ],
            [
                'name' => 'weight loss',
                'type' => 'product'
            ],
            [
                'name' => 'weight gain',
                'type' => 'product'
            ],
            [
                'name' => 'skin care',
                'type' => 'product'
            ],
            [
                'name' => 'boobs',
                'type' => 'product'
            ],
            [
                'name' => 'sexual wellness',
                'type' => 'product'
            ],
            [
                'name' => 'facial treatment',
                'type' => 'service'
            ],
            [
                'name' => 'pedicure treatment',
                'type' => 'service'
            ],
            [
                'name' => 'skin & body treatment',
                'type' => 'service'
            ],
            [
                'name' => 'semi permanent section',
                'type' => 'service'
            ],
            [
                'name' => 'body contouring',
                'type' => 'service'
            ],
            [
                'name' => 'body massage',
                'type' => 'service'
            ]
            
        ];
        
        DB::table('categories')->insert($categories);
    }
}
