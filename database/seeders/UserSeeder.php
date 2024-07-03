<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => "seif",
            'email' => "seif@gmail.com",
            'password' => Hash::make('Seif1234'),
            "type"=>"individual",
            "role"=>"admin",
            "is_leader"=>0,
            "created_at"=>now(),
            "created_at"=>now()
        ]);

    }
}
