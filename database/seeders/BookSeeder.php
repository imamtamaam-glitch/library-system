<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run()
    {
        $books = [
            ['judul' => 'Tata cara belajar mengaji', 'penulis' => 'Asep', 'tahun-terbit' => 2024, 'stock' => 5],
            ['judul' => 'Pandai membaca gerak tubuh', 'penulis' => 'Mentalist', 'tahun-terbit' => 2012, 'stock' => 10],
            ['judul' => 'Makan mie ayam sebelum meninggal', 'penulis' => 'Nurdin', 'tahun-terbit' => 2077, 'stock' => 7],
            ['judul' => 'Si anak pintar', 'penulis' => 'Tere liye', 'tahun-terbit' => 2018, 'stock' => 15],
            ['judul' => 'Naruto', 'penulis' => 'Masashi Kisimoto', 'tahun-terbit' => 2000, 'stock' => 8],
        ];
    
        foreach ($books as $book) {
        Book::create($book);
        }
    }
}
