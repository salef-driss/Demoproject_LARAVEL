<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bier;


class BierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bier::create([
            'naam' => 'Corona',
            'prijs' => 3,
            'bierimage' => 'corona.jpg',
            'stok' => 100,
            'status' => 1,
        ]);


        Bier::create([
            'naam' => 'Budweiser',
            'prijs' => 6,
            'bierimage' => 'budweiser.jpg',
            'stok' => 50, // Bijvoorbeeld, 50 stuks beschikbaar
            'status' => 1, // Bijvoorbeeld, actief
        ]);


        Bier::create([
            'naam' => 'Duvel',
            'prijs' => 4,
            'bierimage' => 'duvel.jpg',
            'stok' => 20, // Bijvoorbeeld, 50 stuks beschikbaar
            'status' => 1, // Bijvoorbeeld, actief
        ]);


        Bier::create([
            'naam' => 'heineken',
            'prijs' => 5,
            'bierimage' => 'heineken.jpg',
            'stok' => 80, // Bijvoorbeeld, 50 stuks beschikbaar
            'status' => 1, // Bijvoorbeeld, actief
        ]);


        Bier::create([
            'naam' => 'Hoegaarden.jpg',
            'prijs' => 4,
            'bierimage' => 'hoegaarden.jpg',
            'stok' => 20, // Bijvoorbeeld, 50 stuks beschikbaar
            'status' => 1, // Bijvoorbeeld, actief
        ]);
    }
}
