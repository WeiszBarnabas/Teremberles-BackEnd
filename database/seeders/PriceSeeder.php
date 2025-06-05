<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prices')->insert([
            [
                'category' => 'Eseti beltéri takarítás óradíja',
                'egyetem' => 3000,
                'egyetem_hetvege' => 3500,
                'kulso' => 3800,
                'kulso_hetvege' => 4800,
            ],
            [
                'category' => 'Eseti recepció/porta óradíja',
                'egyetem' => 3000,
                'egyetem_hetvege' => 3500,
                'kulso' => 3800,
                'kulso_hetvege' => 4800,
            ],
            [
                'category' => 'Eseti kültéri takarítás óradíja',
                'egyetem' => 3000,
                'egyetem_hetvege' => 3500,
                'kulso' => 3800,
                'kulso_hetvege' => 4800,
            ],
            [
                'category' => 'Eseti karbantartási feladatok óradíja',
                'egyetem' => 3900,
                'egyetem_hetvege' => 4500,
                'kulso' => 5000,
                'kulso_hetvege' => 6000,
            ],
            [
                'category' => 'Eseti gondnoksági feladatok óradíja',
                'egyetem' => 3900,
                'egyetem_hetvege' => 4500,
                'kulso' => 5000,
                'kulso_hetvege' => 6000,
            ],
            [
                'category' => 'Rendezvény biztonságszervezés, biztonsági dokumentáció díja, kiemelt helyszín',
                'egyetem' => 85000,
                'egyetem_hetvege' => 85000,
                'kulso' => 110000,
                'kulso_hetvege' => 110000,
            ],
            [
                'category' => 'Rendezvény biztonságszervezés, biztonsági dokumentáció díja, általános helyszín',
                'egyetem' => 50000,
                'egyetem_hetvege' => 50000,
                'kulso' => 70000,
                'kulso_hetvege' => 70000,
            ],
            [
                'category' => 'Rendezvénybiztos szolgáltatás díja (rendezvényeken felmerülő biztonsági feladatok koordinálása, min. 4 óra)',
                'egyetem' => 5500,
                'egyetem_hetvege' => 5500,
                'kulso' => 6000,
                'kulso_hetvege' => 6000,
            ],
            [
                'category' => 'Rendezvényeken, indokolt esetben egyéb helyszíneken biztonsági személyzet díja (min. 4 óra)',
                'egyetem' => 3500,
                'egyetem_hetvege' => 3500,
                'kulso' => 3900,
                'kulso_hetvege' => 3900,
            ],
            [
                'category' => 'Zenés-táncos rendezvényeken, indokolt esetben kiemelt helyszíneken biztonsági személyzet díja (min. 4 óra)',
                'egyetem' => 3900,
                'egyetem_hetvege' => 4500,
                'kulso' => 4500,
                'kulso_hetvege' => 4500,
            ],
            [
                'category' => 'Tűz- munkavédelmi szolgáltatás díja',
                'egyetem' => 8500,
                'egyetem_hetvege' => 8500,
                'kulso' => 10000,
                'kulso_hetvege' => 11000,
            ],
            [
                'category' => 'Biztonságtechnikai szolgáltatás díja',
                'egyetem' => 8500,
                'egyetem_hetvege' => 8500,
                'kulso' => 10000,
                'kulso_hetvege' => 11000,
            ],
        ]);
    }
}
