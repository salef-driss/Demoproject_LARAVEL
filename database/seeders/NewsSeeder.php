<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\User;


class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            News::create([
                'Title' => 'Nieuwe silo',
                'Cover_Image' => 'news4.jpg',
                'Content' => 'We hebben een nieuwe silo aangekocht voor uw beste bier in te brouwen',
                'Publishing_date' => now(),
                'user_id' => User::where('email', 'admin@ehb.be')->first()->id,
            ]);


            News::create([
                'Title' => 'Nieuw Bier',
                'Cover_Image' => 'news3.jpg',
                'Content' => 'We hebben een nieuwe bier Compel. Het is een verfrissende nieuwe bier die u zeker moet proeven !!!!',
                'Publishing_date' => now(),
                'user_id' => User::where('email', 'admin@ehb.be')->first()->id,
            ]);
    }
  }
}
