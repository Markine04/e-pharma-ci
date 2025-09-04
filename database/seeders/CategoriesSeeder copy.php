<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
        //     'libelle' => 'John doe',
        //     'image' => 'john@gmail.com',
        //     'user_enreg' => '911234567891',
        //     'password' => Hash::make('john@123')
        // ],
        // [
            "libelle"=>"Sirop",
            "image"=>null,
            "description"=> "Sirop",
            "user_enreg"=>2,
            "created_at"=>"2025-07-01 10:41:33",
            "updated_at" => "2025-07-01 10:41:33"
        ]);
        DB::table('categories')->insert([
            "libelle"=> "Efferverssant",
            "image"=> null,
            "description"=> "Efferverssant",
            "user_enreg"=> 2,
            "created_at" => "2025-07-01 10:42:27",
            "updated_at" => "2025-07-01 11:01:54"
        ]);
    }
}
