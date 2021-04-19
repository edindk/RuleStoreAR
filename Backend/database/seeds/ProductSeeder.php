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
            'itemNumber' => '4.84.7745',
            'model' => 'A200',
            'height' => 5340,
            'depth' => 2050,
            'width' => 2050,
            'outletHeight' => 610,
            'volume' => 15.60,
            'contents' => 10.14,
            'bottomConeSlope' => 45,
            'supplyAir' => true,
            'price' => 18.610
        ]);

        DB::table('products')->insert([
            'productId' => 2,
            'type' => 'Agrosilo',
            'itemNumber' => '4.84.7745',
            'model' => 'A200',
            'height' => 5340,
            'depth' => 2050,
            'width' => 2050,
            'outletHeight' => 610,
            'volume' => 15.60,
            'contents' => 10.14,
            'bottomConeSlope' => 45,
            'supplyAir' => true,
            'price' => 18.610
        ]);

        DB::table('products')->insert([
            'productId' => 3,
            'type' => 'Agrosilo',
            'itemNumber' => '4.84.7745',
            'model' => 'A200',
            'height' => 5340,
            'depth' => 2050,
            'width' => 2050,
            'outletHeight' => 610,
            'volume' => 15.60,
            'contents' => 10.14,
            'bottomConeSlope' => 45,
            'supplyAir' => true,
            'price' => 18.610
        ]);
    }
}
