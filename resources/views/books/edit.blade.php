@extends('layouts.app')

@section('content')
    <h1>Edit Buku</h1>
    
    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label>Judul:</label><br>
        <input type="text" name="judul" value="{{ $book->judul }}" required><br><br>
        
        <label>Penulis:</label><br>
        <input type="text" name="penulis" value="{{ $book->penulis }}" required><br><br>
        
        <label>Tahun:</label><br>
        <input type="number" name="tahun_terbit" value="{{ $book->tahun_terbit }}" required><br><br>
        
        <label>Stok:</label><br>
        <input type="number" name="stock" value="{{ $book->stock }}" required><br><br>
        
        <button type="submit">Update</button>
    </form>
@endsection