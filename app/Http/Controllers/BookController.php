<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $messages = [
            'judul.required'       => 'Kolom judul buku wajib diisi.',
            'judul.unique'         => 'Judul buku ini sudah ada di database, silakan gunakan judul lain.',
            'penulis.required'     => 'Kolom nama penulis wajib diisi.',
            'tahunterbit.required' => 'Kolom tahun terbit wajib diisi.',
            'tahunterbit.digits'   => 'Tahun terbit harus terdiri dari persis 4 angka (contoh: 2024).',
            'tahunterbit.lte'      => 'Tahun terbit tidak boleh melebihi tahun saat ini.',
            'tahunterbit.min'      => 'Tahun terbit minimal tahun 1900.',
            'stock.required'       => 'Kolom stok wajib diisi.',
            'stock.min'            => 'Stok buku tidak boleh kurang dari 0.',
            'category_id.required' => 'Kategori wajib dipilih.',
            'category_id.exists'   => 'Kategori yang dipilih tidak valid.',
        ];

        $validated = $request->validate([
            'judul'       => 'required|string|max:255|unique:books,judul',
            'penulis'     => 'required|string|max:255',
            'tahunterbit' => 'required|integer|digits:4|min:1900|lte:' . date('Y'),
            'stock'       => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ], $messages);

        // Menggunakan $validated langsung agar category_id otomatis tersimpan
        Book::create($validated);

        return redirect()->route('books.index')
            ->with('success', 'Data buku berhasil ditambahkan.');
    }

    public function edit(Book $book)
    {
        $categories = Category::orderBy('name')->get();
        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $messages = [
            'judul.required'       => 'Kolom judul buku wajib diisi.',
            'judul.unique'         => 'Judul buku ini sudah ada di database, silakan gunakan judul lain.',
            'penulis.required'     => 'Kolom nama penulis wajib diisi.',
            'tahunterbit.required' => 'Kolom tahun terbit wajib diisi.',
            'tahunterbit.digits'   => 'Tahun terbit harus terdiri dari persis 4 angka (contoh: 2024).',
            'tahunterbit.lte'      => 'Tahun terbit tidak boleh melebihi tahun saat ini.',
            'tahunterbit.min'      => 'Tahun terbit minimal tahun 1900.',
            'stock.required'       => 'Kolom stok wajib diisi.',
            'stock.min'            => 'Stok buku tidak boleh kurang dari 0.',
            'category_id.required' => 'Kategori wajib dipilih.',
            'category_id.exists'   => 'Kategori yang dipilih tidak valid.',
        ];

        $validated = $request->validate([
            'judul'       => ['required', 'string', 'max:255', Rule::unique('books', 'judul')->ignore($book->id)],
            'penulis'     => 'required|string|max:255',
            'tahunterbit' => 'required|integer|digits:4|min:1900|lte:' . date('Y'),
            'stock'       => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ], $messages);

        $book->update($validated);

        return redirect()->route('books.index')
            ->with('success', 'Data buku berhasil diperbarui.');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')
            ->with('success', 'Data buku berhasil dihapus.');
    }
}