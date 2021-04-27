<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'productId' => 1,
            'type' => 'Agrosilo',
            'itemNumber' => '4.16.7645S',
            'model' => 'A-300/6-45°',
            'height' => 5110,
            'depth' => 3000,
            'width' => 3000,
            'outletHeight' => 550,
            'volume' => 30.51,
            //'contents' => null,
            'bottomConeSlope' => 45,
            //'supplyAir' => null,
            'price' => 43.750
        ]);

        DB::table('products')->insert([
            'productId' => 2,
            'type' => 'Mineralsilo',
            'itemNumber' => '4.93.0194',
            'model' => 'MI-190/4-60°',
            'height' => 3560,
            'depth' => 2018,
            'width' => 2018,
            'outletHeight' => 580,
            'volume' => 7.25,
            //'contents' => null,
            'bottomConeSlope' => 60,
            //'supplyAir' => null,
            'price' => 24.030
        ]);

        DB::table('products')->insert([
            'productId' => 3,
            'type' => 'U-silo',
            'itemNumber' => '6.05.5647',
            'model' => 'MU-250/16-45°',
            'height' => 12400,
            'depth' => 2550,
            'width' => 2550,
            'outletHeight' => 880,
            'volume' => 61.6,
            //'contents' => null,
            'bottomConeSlope' => 45,
            //'supplyAir' => null,
            'price' => 89.740
        ]);
    }
}
