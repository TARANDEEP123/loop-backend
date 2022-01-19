<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $brand = [
             [
             'name'=> 'Hyundai'
             ],
             [
                 'name' => 'TATA'

             ],[
                 'name' => 'KIA'
             ]];
        DB::table('brand_tbl')->insert($brand);

    }
}
