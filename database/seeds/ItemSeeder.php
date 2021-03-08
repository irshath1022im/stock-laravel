<?php

use App\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $stores = [
            ['name' => 'polo-mi','category_id' => 1, 'initialQty' => 5],
            ['name' => 'polo-sm','category_id' => 1, 'initialQty' => 5],
            ['name' => 'polo-lg','category_id' => 1, 'initialQty' => 5],
            ['name' => 'polo-xl','category_id' => 1, 'initialQty' => 5],
            ['name' => 'polo-xxl','category_id' => 1, 'initialQty' => 5],
            ['name' => 'long-sleave-sm','category_id' => 2, 'initialQty' => 5],
            ['name' => 'long-sleave-m','category_id' => 2, 'initialQty' => 5],
            ['name' => 'long-sleave-lg','category_id' => 2, 'initialQty' => 5],
            ['name' => 'long-sleave-xl','category_id' => 2, 'initialQty' => 5],
            ['name' => 'long-sleave-xxl','category_id' => 2, 'initialQty' => 5],
            ['name' => 'hoodies-sm','category_id' =>3, 'initialQty' => 5],
            ['name' => 'hoodies-m','category_id' => 3, 'initialQty' => 5],
            ['name' => 'hoodies-lg','category_id' =>3, 'initialQty' => 5],
            ['name' => 'hoodies-xl','category_id' =>3, 'initialQty' => 5],
            ['name' => 'hoodies-xxl','category_id'=>3, 'initialQty' => 5],
            ['name' => 'staffjacket-sm','category_id' =>4, 'initialQty' => 0],
            ['name' => 'staffjacket-m','category_id' => 4, 'initialQty' => 0],
            ['name' => 'staffjacket-lg','category_id' =>4, 'initialQty' => 0],
            ['name' => 'staffjacket-xl','category_id' =>4, 'initialQty' => 0],
            ['name' => 'staffjacket-xxl','category_id'=>4, 'initialQty' => 0],
            ['name' => 'Al Shahania Stud Activity Book', 'category_id' => 8, 'initialQty' => 0],
            ['name' => 'cap (assy and jaafer)', 'category_id' => 9, 'initialQty' => 0],
            ['name' => 'cap (green with orange logo)', 'category_id' => 9, 'initialQty' => 0]

        ];

     // factory(App\Item::class, 100)->create();

     Item::insert($stores);

    }
}
