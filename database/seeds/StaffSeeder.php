<?php

use App\Staff;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $staffs = [
            ['staff_name' => 'Mohamed Irshath'],
            ['staff_name' => 'Nafi'],
            ['staff_name' => 'Dean Lavy'],
            ['staff_name' => 'Rania'],
            ['staff_name' => 'Alex'],
            ['staff_name' => 'Glen'],
            ['staff_name' => 'Zeeshan'],
            ['staff_name' => 'Shafi'],
            ['staff_name' => 'Juanma']
        ];

        foreach( $staffs as $staff) {
            Staff::create($staff);
        }

    }
}
