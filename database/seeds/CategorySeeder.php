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
            ['category' => 'polo', 'store_id' => 1, 'coverPicture' => 'categoryCoverPhotos/polo.jpg'],
            ['category' => 'longSleav', 'store_id' => 1, 'coverPicture' => 'categoryCoverPhotos/longSleav.jpg', ],
            ['category' => 'hoodies', 'store_id' => 1, 'coverPicture' => 'categoryCoverPhotos/hoodies.jpg', ],
            ['category' => 'staffJacket', 'store_id' => 1, 'coverPicture' => 'categoryCoverPhotos/staffJacket.jpg', ],
            ['category' => 'staffJacket', 'store_id' => 1, 'coverPicture' => 'categoryCoverPhotos/staffJacket.jpg', ],
            ['category' => 'trousersWithPocket', 'store_id' => 1, 'coverPicture' => 'categoryCoverPhotos/trousersWithPocket.jpg', ],
            ['category' => 'shortTrousers', 'store_id' => 1, 'coverPicture' => 'categoryCoverPhotos/shortTrousers.jpg', ],
            ['category' => 'al shahania stud activity book', 'store_id' =>2, 'coverPicture' => ''],
            ['category' => 'al shahania stud cap', 'store_id' =>2, 'coverPicture' => ''],
            ['category' => 'al shahania stud pen', 'store_id' =>2, 'coverPicture' => ''],
        ];

        Category::insert($stores);
    }
}
