<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Winkelkar;
use App\Models\User;

class winkelkarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Winkelkar::create([
            'user_id' => User::where('email', 'driss@gmail.com')->first()->id,
            'aantal' => 0,
            'totaalprijs' => 0,
        ]);

        Winkelkar::create([
            'user_id' => User::where('email', 'admin@ehb.be')->first()->id,
            'aantal' => 0,
            'totaalprijs' => 0, // Bijvoorbeeld, totaalprijs voor 3 bieren
        ]);
    }
}
