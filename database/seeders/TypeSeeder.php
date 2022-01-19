<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = [
                    [
                        'name' => 'Petrol',
                    ],
                    [
                        'name' => 'Disel',

                    ], [
                        'name' => 'CNG',
                ]];
                DB::table('type_tbl')->insert($type);
    }
}
