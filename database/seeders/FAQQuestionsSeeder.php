<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\FAQQuestions;
use App\Models\FAQCategorie;

class FAQQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FAQQuestions::create([
            'question_Title' => 'Hoe kan ik me registreren?',
            'question_content' => 'Om je te registreren, klik je op de "Registreren" knop bovenaan de pagina. Volg de instructies en vul de vereiste informatie in het registratieformulier in.',
            'FaQCategorie_id' => FAQCategorie::where('CategorieName', 'Registratie')->first()->id,
        ]);


        FAQQuestions::create([
            'question_Title' => 'Hoe kan ik bier bestellen?',
            'question_content' => 'Om bier te bestellen, ga naar de pagina met beschikbare bieren. Klik op het gewenste bier, selecteer de hoeveelheid en voeg het toe aan je winkelkar. Ga vervolgens naar je winkelkar, controleer je bestelling en voltooi de betaling.',
            'FaQCategorie_id' => FAQCategorie::where('CategorieName', 'Bestellingen')->first()->id,
        ]);
    }
}
