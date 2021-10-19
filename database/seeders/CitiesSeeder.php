<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert(
            [
                'name' => "Bogota",
                'cod' => uniqid(),
            ]
        );
        DB::table('cities')->insert(
            [
                'name' => "Zipaquira",
                'cod' => uniqid(),
            ]
        );
        DB::table('cities')->insert(
            [
                'name' => "Ubate",
                'cod' => uniqid(),
            ]
        );
        DB::table('cities')->insert(
            [
                'name' => "Nemocon",
                'cod' => uniqid(),
            ]
        );
        DB::table('cities')->insert(
            [
                'name' => "Sopo",
                'cod' => uniqid(),
            ]
        );
        DB::table('cities')->insert(
            [
                'name' => "Villeta",
                'cod' => uniqid(),
            ]
        );
        DB::table('cities')->insert(
            [
                'name' => "La calera",
                'cod' => uniqid(),
            ]
        );
        DB::table('cities')->insert(
            [
                'name' => "valledupar",
                'cod' => uniqid(),
            ]
        );
        DB::table('cities')->insert(
            [
                'name' => "maicao",
                'cod' => uniqid(),
            ]
        );
        DB::table('cities')->insert(
            [
                'name' => "Chia",
                'cod' => uniqid(),
            ]
        );
    }
}
