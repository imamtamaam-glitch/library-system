@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    <h1>Tambah Buku Baru</h1>
    
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <label>Judul:</label><br>
        <input type="text" name="judul" required><br><br>
        
        <label>Penulis:</label><br>
        <input type="text" name="penulis" required><br><br>
        
        <label>Tahun:</label><br>
        <input type="number" name="tahun_terbit" required><br><br>
        
        <label>Stok:</label><br>
        <input type="number" name="stock" required><br><br>
        
        <button type="submit">Simpan</button>
    </form>
@endsection