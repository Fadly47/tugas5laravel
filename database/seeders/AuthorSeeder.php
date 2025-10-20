<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::create([
            'name' => 'Masashi Kishimoto',
            'photo' => 'MK.jpg',
            'bio' => 'Mangaka yang dikenal dengan karya legendarisnya dalam menciptakan seri Naruto'
        ]);
        
        Author::create([
            'name' => 'Raditya Dika',
            'photo' => 'radityadika.jpg',
            'bio' => 'Penulis, komika, dan sutradara asal Indonesia, dikenal dengan karya-karyanya di bidang komedi'
        ]);

        Author::create([
            'name' => 'Andrzej Sapkowski',
            'photo' => 'andrzej.jpg',
            'bio' => 'Pengarang yang dikenal dengan karyanya dalam menciptakan serial the witcher yang kemudian diadaptasi menjadi serial game'
        ]);
    }
}
