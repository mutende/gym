<?php

use Illuminate\Database\Seeder;

class WeekdaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('weekdays')->insert([
           ["day"=>"Monday"],
            ["day"=>"Tuesday"],
            ["day"=>"Wednesday"],
            ["day"=>"Thursday"],
            ["day"=>"Friday"],
            ["day"=>"Saturday"],

        ]);
    }
}
