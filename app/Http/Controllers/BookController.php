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
    $messages = [
        'judul.required'        => 'Kolom judul buku wajib diisi.',
        'judul.unique'          => 'Judul buku ini sudah ada di database, silakan gunakan judul lain.',
        'penulis.required'      => 'Kolom nama penulis wajib diisi.',
        'penulis.unique'        => 'Nama penulis ini sudah terdaftar sebelumnya.',
        'tahunterbit.required' => 'Kolom tahun terbit wajib diisi.',
        'tahunterbit.digits'   => 'Tahun terbit harus terdiri dari persis 4 angka (contoh: 2024).',
        'tahunterbit.lte'      => 'Tahun terbit tidak boleh melebihi tahun saat ini.',
        'tahunterbit.min'      => 'Tahun terbit minimal tahun 1900.',
        'stock.required'        => 'Kolom stok wajib diisi.',
        'stock.min'             => 'Stok buku tidak boleh kurang dari 0.',
    ];

    $validated = $request->validate([
        'judul'        => 'required|string|max:255|unique:books,judul',
        'penulis'      => 'required|string|max:255|unique:books,penulis', 
        'tahunterbit' => 'required|integer|digits:4|min:1900|lte:' . date('Y'),
        'stock'        => 'required|integer|min:0',
    ], $messages);

    Book::create([
        'judul'        => $validated['judul'],
        'penulis'      => $validated['penulis'],
        'tahunterbit' => $validated['tahunterbit'],
        'stock'        => $validated['stock'],
    ]);

    return redirect()
        ->route('books.index')
        ->with('success', 'Data buku berhasil ditambahkan.');
}

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $messages = [
        'judul.required'        => 'Kolom judul buku wajib diisi.',
        'judul.unique'          => 'Judul buku ini sudah ada di database, silakan gunakan judul lain.',
        'penulis.required'      => 'Kolom nama penulis wajib diisi.',
        'penulis.unique'        => 'Nama penulis ini sudah terdaftar sebelumnya.',
        'tahunterbit.required'  => 'Kolom tahun terbit wajib diisi.',
        'tahunterbit.digits'    => 'Tahun terbit harus terdiri dari persis 4 angka (contoh: 2024).',
        'tahunterbit.lte'       => 'Tahun terbit tidak boleh melebihi tahun saat ini.',
        'tahunterbit.min'       => 'Tahun terbit minimal tahun 1900.',
        'stock.required'        => 'Kolom stok wajib diisi.',
        'stock.min'             => 'Stok buku tidak boleh kurang dari 0.',
    ];
        $validated = $request->validate([
        'judul'        => 'required|string|max:255|unique:books,judul',
        'penulis'      => 'required|string|max:255|unique:books,penulis', 
        'tahunterbit'  => 'required|integer|digits:4|min:1900|lte:' . date('Y'),
        'stock'        => 'required|integer|min:0',
    ], $messages);


        $book->update([
        'judul'       => $validated['judul'],
        'penulis'     => $validated['penulis'],
        'tahunterbit' => $validated['tahunterbit'],
        'stock'       => $validated['stock'],
]);
        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}