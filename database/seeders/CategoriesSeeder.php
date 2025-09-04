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
        DB::table('categories')->insert([
            "libelle"=>"Sirop",
            "image"=>'sirop.png',
            "user_enreg"=>2,
            "created_at"=>"2025-07-01 10:41:33",
            "updated_at" => "2025-07-01 10:41:33"
        ]);
        DB::table('categories')->insert([
            "libelle"=> "Effervescence",
            "image"=> 'effervescence.png',
            "user_enreg"=> 2,
            "created_at" => "2025-07-01 10:42:27",
            "updated_at" => "2025-07-01 11:01:54"
        ]);


//         ('Antibiotiques', 'Médicaments antibactériens'),
// ('Antidouleurs', 'Médicaments contre la douleur'),
// ('Cardiovasculaire', 'Médicaments pour le cœur'),
// ('Digestif', 'Médicaments pour le système digestif'),
// ('Dermatologique', 'Médicaments pour la peau');
    }
}
