<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::create([
            'name' => 'Action',
            'description' => 'Genre yang menekankan pada adegan aksi.'
        ]);

        Genre::create([
            'name' => 'Romance',
            'description' => 'Genre yang menekankan pada hubungan romansa dan cinta.'
        ]);

        Genre::create([
            'name' => 'Fantasi',
            'description' => 'Genre yang meneksplorasi imajinasi dan dunia tak nyata.'
        ]);
    }
}
