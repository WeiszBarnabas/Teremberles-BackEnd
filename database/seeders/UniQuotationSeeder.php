<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UniQuotationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('uniquotation')->insert([
            [
                'name' => 'Győri Városi Egywetemi Csarnok bérleti díja',
                'quantity' => 1,
                'excluding_vat' => 0,
                'vat' => 0,
                'gross_amount' => 0
            ],
            [
                'name' => 'Győri Városi Egywetemi Csarnok takarítás',
                'quantity' => 1,
                'excluding_vat' => 0,
                'vat' => 27,
                'gross_amount' => 0
            ],
            [
                'name' => 'ÚT Aula bérleti díja',
                'quantity' => 1,
                'excluding_vat' => 0,
                'vat' => 0,
                'gross_amount' => 0
            ],
            [
                'name' => 'ÚT 114 bérleti díja',
                'quantity' => 1,
                'excluding_vat' => 0,
                'vat' => 0,
                'gross_amount' => 0
            ],
            [
                'name' => 'MC 001 és 002 bérleti díja',
                'quantity' => 1,
                'excluding_vat' => 0,
                'vat' => 0,
                'gross_amount' => 0
            ],
            [
                'name' => 'MC 121 bérleti díja',
                'quantity' => 1,
                'excluding_vat' => 0,
                'vat' => 0,
                'gross_amount' => 0
            ],
            [
                'name' => 'MC 122 és 123 bérleti díja',
                'quantity' => 1,
                'excluding_vat' => 0,
                'vat' => 0,
                'gross_amount' => 0
            ],
            [
                'name' => 'MC 227 és 228 bérleti díja',
                'quantity' => 1,
                'excluding_vat' => 0,
                'vat' => 0,
                'gross_amount' => 0
            ],
            [
                'name' => 'Takarítás',
                'quantity' => 1,
                'excluding_vat' => 0,
                'vat' => 27,
                'gross_amount' => 0
            ],
            [
                'name' => 'Műszaki ügyelet (1 fő)',
                'quantity' => 1,
                'excluding_vat' => 0,
                'vat' => 27,
                'gross_amount' => 0
            ],
            [
                'name' => 'Biztonsági személyzet',
                'quantity' => 1,
                'excluding_vat' => 0,
                'vat' => 27,
                'gross_amount' => 0
            ],
            [
                'name' => 'Rendezvénybiztos (1 fő) minden rendezvényünkhöz',
                'quantity' => 1,
                'excluding_vat' => 0,
                'vat' => 27,
                'gross_amount' => 0
            ],
            [
                'name' => 'Portaszolgálat',
                'quantity' => 1,
                'excluding_vat' => 0,
                'vat' => 27,
                'gross_amount' => 0
            ],
            [
                'name' => 'Biztonsági terv, bejelentéshez szükséges dokumentáció elkészítése',
                'quantity' => 1,
                'excluding_vat' => 0,
                'vat' => 27,
                'gross_amount' => 0
            ],
            [
                'name' => 'Csarnok szőnyegezése, ragasztás',
                'quantity' => 1,
                'excluding_vat' => 0,
                'vat' => 27,
                'gross_amount' => 0
            ],
            [
                'name' =>'Háló leszedése alpintechnikával',
                'quantity' => 1,
                'excluding_vat' => 0,
                'vat' => 27,
                'gross_amount' => 0
            ],
            [
                'name' => 'Székek bérlése',
                'quantity' => 1,
                'excluding_vat' => 0,
                'vat' => 27,
                'gross_amount' => 0
            ],
            [
                'name' => 'Szemétszállítás - Konténer',
                'quantity' => 1,
                'excluding_vat' => 0,
                'vat' => 27,
                'gross_amount' => 0
            ]
        ]);
    }
}
