<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\FAQCategorie;
use App\Models\User;

class FAQCategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FAQCategorie::create([
            'CategorieName' => 'Registratie',
            'user_id' => User::where('email', 'admin@ehb.be')->first()->id,
        ]);

        // FAQ-categorie Bestellingen
        FAQCategorie::create([
            'CategorieName' => 'Bestellingen',
            'user_id' => User::where('email', 'admin@ehb.be')->first()->id,
        ]);
    }
}
