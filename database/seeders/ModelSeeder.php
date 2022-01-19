<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelSeeder extends Seeder
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
                        'name' => 'XUV',
                    ],
                    [
                        'name' => 'Nexon',

                    ], [
                        'name' => 'Sonet',
            ]];
            DB::table('model_tbl')->insert($model);

    }
}
