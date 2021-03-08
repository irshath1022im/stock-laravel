<?php

//namespace Database\Seeds;

use Illuminate\Database\Seeder;
use App\Store;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stores = [
            ['name' => 'uniform'],
            ['name' => 'promotion']
        ];

        Store::insert($stores);
    }
}
