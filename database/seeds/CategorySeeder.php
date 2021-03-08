<?php

//namespace Database\Seeds;

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stores = [
            ['category' => 'polo', 'store_id' => 1],
            ['category' => 'longSleav', 'store_id' => 1],
            ['category' => 'hoodies', 'store_id' => 1],
            ['category' => 'staffJacket', 'store_id' => 1],
            ['category' => 'staffJacket', 'store_id' => 1],
            ['category' => 'trousersWithPocket', 'store_id' => 1],
            ['category' => 'shortTrousers', 'store_id' => 1],
            ['category' => 'al shahania stud activity book', 'store_id' =>2],
            ['category' => 'al shahania stud cap', 'store_id' =>2],
            ['category' => 'al shahania stud pen', 'store_id' =>2],
        ];

        Category::insert($stores);
    }
}
