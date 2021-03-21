<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(StoreSeeder::class);
        $this->call(StaffSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ItemSeeder::class);
        $this->call(ReceivingSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(DeliverySeeder::class);
        $this->call(IssuedItems::class);
    }
}
