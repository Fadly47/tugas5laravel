<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'Chronicles of Solaris',
            'description' => 'Sebuah kisah epik tentang konflik antar planet dan perjuangan seorang pilot muda dalam menyelamatkan galaksi.',
            'price' => '120000',
            'stock' => '10',
            'cover_photo' => 'solaris.png',
            'genre_id' => '1',
            'author_id' => '1',
        ]);
        
        Book::create([
            'title' => 'Senja di Ujung Jalan',
            'description' => 'Novel romantis yang menggambarkan perjalanan cinta dan kehilangan di tengah hiruk-pikuk kota Jakarta.',
            'price' => '150000',
            'stock' => '20',
            'cover_photo' => 'senja.png',
            'genre_id' => '2',
            'author_id' => '2',
        ]);
        
        Book::create([
            'title' => 'Legenda Laut Biru',
            'description' => 'Petualangan seru seorang kapten muda dan kru kapal bajak laut dalam mencari harta karun legendaris.',
            'price' => '60000',
            'stock' => '15',
            'cover_photo' => 'lautbiru.png',
            'genre_id' => '3',
            'author_id' => '3',
        ]);
    }
}
