<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Exception; // <-- Fontos a hibakezeléshez

class LabdarugoSeeder extends Seeder
{
    public function run(): void
    {
        // Kiírjuk a terminálba, hogy mit csinálunk
        $this->command->info('LabdarugoSeeder indítása...');

        DB::table('labdarugok')->truncate();

        $fajlUti = __DIR__ . '/data/labdarugo.txt';

        // === HIBELLENŐRZÉS 1: Létezik a fájl? ===
        if (!File::exists($fajlUti)) {
            $this->command->error('HIBA: A labdarugo.txt fájl nem található itt:');
            $this->command->error($fajlUti);
            return; // Leállítjuk a seedert
        }
        
        $this->command->info('Fájl beolvasása sikeres: ' . $fajlUti);

        $tartalom = File::get($fajlUti);
        $sorok = explode("\n", $tartalom);
        $beszurandoAdatok = [];
        $lineNumber = 0;

        foreach ($sorok as $sor) {
            $lineNumber++;

            // 1. sor (fejléc) kihagyása
            if ($lineNumber == 1) {
                continue;
            }
            
            $sor = trim($sor);
            if (empty($sor)) {
                continue; // Üres sorok kihagyása
            }

            $adat = explode("\t", $sor); // Tabulátorral bontunk

            // === HIBELLENŐRZÉS 2: Oszlopszám ===
            if (count($adat) < 10) {
                // Ha 1, akkor valószínűleg szóközök vannak tabulátor helyett
                if (count($adat) === 1) {
                    $this->command->error('HIBA: A fájl valószínűleg szóközöket használ tabulátor helyett.');
                    $this->command->error('Hibás sor (nem lehetett \t mentén bontani): ' . $sor);
                    return; // Leállítjuk a seedert
                }
                
                $this->command->warn("Figyelem: A(z) $lineNumber. sor hibás (kevés oszlop), kihagyva.");
                continue;
            }

            // Adatok feldolgozása
            try {
                $beszurandoAdatok[] = [
                    'id' => $adat[0],
                    'mezszam' => $adat[1],
                    'klubid' => $adat[2],
                    'posztid' => $adat[3],
                    'utonev' => ($adat[4] === '' ? null : $adat[4]),
                    'vezeteknev' => $adat[5],
                    'szulido' => str_replace('.', '-', $adat[6]), // '1997.01.23' -> '1997-01-23'
                    'magyar' => ($adat[7] === '-1'), // '-1' -> true, '0' -> false
                    'kulfoldi' => ($adat[8] === '-1'), // '-1' -> true, '0' -> false
                    'ertek' => $adat[9],
                ];
            } catch (Exception $e) {
                $this->command->error("HIBA a(z) $lineNumber. sor feldolgozása közben: " . $e->getMessage());
                $this->command->error("Hibás sor adatai: " . implode(', ', $adat));
            }
        }

        // Adatok beillesztése
        if (!empty($beszurandoAdatok)) {
            DB::table('labdarugok')->insert($beszurandoAdatok);
            $this->command->info('Sikeresen beillesztve ' . count($beszurandoAdatok) . ' labdarúgó.');
        } else {
            $this->command->warn('Nem volt adat a labdarugok beillesztéséhez (lehet, hogy a fájl üres?).');
        }
    }
}