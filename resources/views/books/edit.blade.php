@extends('layouts.app')

@section('content')
    <h1>Edit Buku</h1>

    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Judul:</label><br>
        <input type="text" name="judul" value="{{ old('judul', $book->judul) }}" >
        @error('judul')
            <span style="color: red; font-size: 14px;"><br>{{ $message }}</span>
        @enderror
        <br><br>

        <label>Penulis:</label><br>
        <input type="text" name="penulis" value="{{ old('penulis', $book->penulis) }}" >
        @error('penulis')
            <span style="color: red; font-size: 14px;"><br>{{ $message }}</span>
        @enderror
        <br><br>

        <label>Tahun:</label><br>
        <input type="number" name="tahunterbit" value="{{ old('tahunterbit', $book->tahunterbit) }}" >
        @error('tahunterbit')
            <span style="color: red; font-size: 14px;"><br>{{ $message }}</span>
        @enderror
        <br><br>

        <label>Stok:</label><br>
        <input type="number" name="stock" value="{{ old('stock', $book->stock) }}" >
        @error('stock')
            <span style="color: red; font-size: 14px;"><br>{{ $message }}</span>
        @enderror
        <br><br>

        <button type="submit">Update</button>
    </form>
@endsection