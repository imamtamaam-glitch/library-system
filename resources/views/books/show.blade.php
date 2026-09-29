@extends('layouts.app')
@section('title', 'Detail Buku')

@section('content')
    <h2>Detail Buku</h2>
    
    <ul>
        <li><strong>ID Buku:</strong> {{ $detailBuku['id'] }}</li>
        <li><strong>Judul Buku:</strong> {{ $detailBuku['judul'] }}</li>
        <li><strong>Penulis:</strong> {{ $detailBuku['penulis'] }}</li>
        <li><strong>Kategori:</strong> {{ $detailBuku['kategori'] }}</li>
        <li><strong>Buku tersedia:</strong> {{ $detailBuku['stock'] }}</li>

    </ul>

    <br>
    <a href="/books">Kembali ke Daftar Buku</a>
@endsection