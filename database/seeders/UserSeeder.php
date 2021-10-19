<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => "Serempre",
                'email' => 'pruebaSerempre@serempre.com',
                'password' => bcrypt('123qwe..'),
                'photo' => null,
            ]
        );
    }
}
