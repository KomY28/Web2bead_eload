<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Ezt a sort adjuk hozzá!

class PosztSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Töröljük a tábla tartalmát, hogy ne legyen duplikáció
        DB::table('posztok')->truncate();

        // Adatok beillesztése
        DB::table('posztok')->insert([
            ['id' => 1, 'nev' => 'bal oldali védő'],
            ['id' => 2, 'nev' => 'jobb oldali középpályás'],
            ['id' => 3, 'nev' => 'bal szélső'],
            ['id' => 4, 'nev' => 'védekező középpályás'],
            ['id' => 5, 'nev' => 'bal oldali középpályás'],
            ['id' => 6, 'nev' => 'belső középpályás'],
            ['id' => 7, 'nev' => 'jobb szélső'],
            ['id' => 8, 'nev' => 'jobb oldali védő'],
            ['id' => 9, 'nev' => 'kapus'],
            ['id' => 10, 'nev' => 'középcsatár'],
            ['id' => 11, 'nev' => 'középső védő'],
            ['id' => 12, 'nev' => 'támadó középpályás'],
            ['id' => 13, 'nev' => 'hátravont csatár'],
            ['id' => 14, 'nev' => 'jobboldali védő'],
        ]);
    }
}
