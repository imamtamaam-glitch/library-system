@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    <h1>Tambah Buku Baru</h1>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        
        <label>Judul:</label><br>
        <input type="text" name="judul" value="{{ old('judul') }}" >
        @error('judul')
            <span style="color: red; font-size: 14px;"><br>{{ $message }}</span>
        @enderror
        <br><br>

        <label>Penulis:</label><br>
        <input type="text" name="penulis" value="{{ old('penulis') }}" >
        @error('penulis')
            <span style="color: red; font-size: 14px;"><br>{{ $message }}</span>
        @enderror
        <br><br>

        <label>Tahun:</label><br>
        <input type="number" name="tahunterbit" value="{{ old('tahunterbit') }}" >
        @error('tahunterbit')
            <span style="color: red; font-size: 14px;"><br>{{ $message }}</span>
        @enderror
        <br><br>

        <label>Stok:</label><br>
        <input type="number" name="stock" value="{{ old('stock') }}" >
        @error('stock')
            <span style="color: red; font-size: 14px;"><br>{{ $message }}</span>
        @enderror
        <br><br>

        <button type="submit">Simpan</button>
    </form>
@endsection