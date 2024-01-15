<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "email" => "driss@gmail.com",
            "password" =>  Hash::make('LOL123'),
             "role" => "not_admin",
             "lastname" => "salef",
             "country" => "Belgium",
             "city" => "Halle",
             "street" => "driepikkel",
             "houseNr" => 23,
             "name" => "driss",
             "status" => 1,
             "aboutme" => "Fill about me in",
             "avatar" => "default4.jpg",
             "birthday" => "2000-01-01"
        ]);

        User::create([
            "email" => "admin@ehb.be",
            "password" =>  Hash::make('Password!321'),
             "role" => "admin",
             "lastname" => "admin",
             "country" => "Belgium",
             "city" => "Halle",
             "street" => "driepikkel",
             "houseNr" => 23,
             "name" => "admin",
             "status" => 1,
             "aboutme" => "Fill about me in",
             "avatar" => "default4.jpg",
             "birthday" => "2000-01-01"
        ]);
    }
}
