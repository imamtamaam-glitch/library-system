<?php

namespace App\Http\Controllers;

class BookController extends Controller
{
    public function index()
    {
        $books = [
            ['id' => 1, 'judul' => 'Naruto'],
            ['id' => 2, 'judul' => 'Filosofi teras'],
            ['id' => 3, 'judul' => 'Atomic Habits'],
            ['id' => 4, 'judul' => 'Social Thinking'],
            ['id' => 5, 'judul' => 'PKN'],
            ['id' => 6, 'judul' => 'Mie ayam sebelum meninggal'],
            ['id' => 7, 'judul' => 'Dunia Alice'],
            ['id' => 8, 'judul' => 'Tata cara haji']
        ];
        
        return view('books.index', compact('books'));
    }

    public function show($id)
    {
        $books = [
            ['id' => 1, 'judul' => 'Naruto', 'kategori' => 'Fiksi', 'penulis' => 'Masashi Kishimoto'],
            ['id' => 2, 'judul' => 'Filosofi teras', 'kategori' => 'Self Improvement', 'penulis' => 'Henry Manampiring'],
            ['id' => 3, 'judul' => 'Atomic Habits', 'kategori' => 'Self Improvement', 'penulis' => 'James Clear'],
            ['id' => 4, 'judul' => 'Social Thinking', 'kategori' => 'Non Fiksi', 'penulis' => 'Sumarudin'],
            ['id' => 5, 'judul' => 'PKN', 'kategori' => 'Sejarah', 'penulis' => 'Kemdikbud'],
            ['id' => 6, 'judul' => 'Mie ayam sebelum meninggal', 'kategori' => 'Fiksi', 'penulis' => 'Brian gatau'],
            ['id' => 7, 'judul' => 'Dunia Alice', 'kategori' => 'Fiksi', 'penulis' => 'Lewis Carroll'],
            ['id' => 8, 'judul' => 'Tata cara haji', 'kategori' => 'Religi', 'penulis' => 'yayasan cahaya mulia']
        ];

        $detailBuku = null;
        foreach ($books as $book) {
            if ($book['id'] == $id) {
                $detailBuku = $book;
                break;
            }
        }

        return view('books.show', compact('detailBuku'));
    }
}