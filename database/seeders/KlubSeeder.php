<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Ezt a sort adjuk hozzá!

class KlubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Töröljük a tábla tartalmát
        DB::table('klubok')->truncate();
        
        // Adatok beillesztése
        DB::table('klubok')->insert([
            ['id' => 1, 'csapatnev' => 'Vasas FC'],
            ['id' => 2, 'csapatnev' => 'Ferencvárosi TC'],
            ['id' => 3, 'csapatnev' => 'Puskás Akadémia FC'],
            ['id' => 4, 'csapatnev' => 'Debreceni VSC'],
            ['id' => 5, 'csapatnev' => 'Budapest Honvéd FC'],
            ['id' => 6, 'csapatnev' => 'Szombathelyi Haladás'],
            ['id' => 7, 'csapatnev' => 'Paksi FC'],
            ['id' => 8, 'csapatnev' => 'Mezőkövesd Zsóry FC'],
            ['id' => 9, 'csapatnev' => 'Diósgyőri VTK'],
            ['id' => 10, 'csapatnev' => 'Újpest FC'],
            ['id' => 11, 'csapatnev' => 'Balmazújváros FC'],
            ['id' => 12, 'csapatnev' => 'Videoton FC'],
        ]);
    }
}