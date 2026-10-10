<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        Book::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'tahun-terbit' => $request->tahun_terbit,
            'stock' => $request->stock,
        ]);
        return redirect()->route('books.index');
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $book->update([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'tahun-terbit' => $request->tahun_terbit,
            'stock' => $request->stock,
        ]);
        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}