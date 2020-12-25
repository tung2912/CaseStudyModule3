<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brand = new Brand();
        $brand->name = 'BACCARAT';
        $brand->save();
        $brand = new Brand();
        $brand->name = 'CIRE TRVDON';
        $brand->save();
        $brand = new Brand();
        $brand->name = 'ARCAHORN';
        $brand->save();
        $brand = new Brand();
        $brand->name = 'FUSTENBERG';
        $brand->save();
        $brand = new Brand();
        $brand->name = 'RIVIERE';
        $brand->save();
        $brand = new Brand();
        $brand->name = 'RALPH LAUUREN';
        $brand->save();
        $brand = new Brand();
        $brand->name = 'DECOR WALTHER';
        $brand->save();
    }
}
