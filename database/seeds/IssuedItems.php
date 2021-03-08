<?php

use Illuminate\Database\Seeder;

class IssuedItems extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\IssuedItem::class, 200)->create();
    }
}
