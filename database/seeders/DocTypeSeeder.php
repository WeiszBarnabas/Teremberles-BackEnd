<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('document_types')->insert([
            [
                'name' => 'Bérleti szerződés',
            ],
            [
                'name' => 'Bérleti szerződés (csarnok)',
            ],
            [
                'name' => 'Használati szerződés',
            ],
            [
                'name' => 'Átláthatósági nyilatkozat',
            ],
        ]);
    }
}
