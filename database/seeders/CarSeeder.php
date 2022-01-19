<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $model = [
                    [
                        'name' => 'TATA NEXON PETROL',
                        'description' => 'Nexon high-strength steel structure absorbs impact energy and protects
                                          the passenger during an unfortunate collision.',
                        'image' => '/Nexon.jpg',
                        'brand_id' => 2,
                        'model_id' => 2,
                        'type_id' => 1,
                        'year' => 2015,
                        'color' => 'Black',
                        'stock_available' => 100
                    ],
                    [
                        'name' => 'TATA NEXON DISEL',
                        'description' => 'Nexon high-strength steel structure absorbs impact energy and protects
                                          the passenger during an unfortunate collision.',
                        'image' => '/Nexon.jpg',
                        'brand_id' => 2,
                        'model_id' => 2,
                        'type_id' => 2,
                        'year' => 2016,
                        'color' => 'Black',
                        'stock_available' => 10
                    ], [
                        'name' => 'KIA SONET PETROL',
                        'description' => 'KIA high-strength steel structure absorbs impact energy and protects
                                          the passenger during an unfortunate collision.',
                        'image' => '/KIA.png',
                        'brand_id' => 3,
                        'model_id' =>3,
                        'type_id' => 1,
                        'year' => 2018,
                        'color' => 'White',
                        'stock_available' => 100
                    ],
                    [
                        'name' => 'KIA SONET DISEL',
                        'description' => 'KIA high-strength steel structure absorbs impact energy and protects
                                          the passenger during an unfortunate collision.',
                        'image' => '/KIA.jpg',
                        'brand_id' => 3,
                        'model_id' =>3,
                        'type_id' => 2,
                        'year' => 2018,
                        'color' => 'BLACK',
                        'stock_available' => 0
                    ],];
                DB::table('car_tbl')->insert($model);

    }
}
