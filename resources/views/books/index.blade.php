@extends('layouts.app')

@section('content')
    <h1>Daftar Buku</h1>
    <a href="{{ route('books.create') }}">Tambah Buku Baru</a>
    <hr>
    
    <table border="1" cellpadding="10">
        <tr>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Tahun</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        @foreach($books as $book)
        <tr>
            <td>{{ $book->judul }}</td>
            <td>{{ $book->penulis }}</td>
            <td>{{ $book->tahun_terbit }}</td>
            <td>{{ $book->stock }}</td>
            <td>
                <!-- Tombol Edit -->
                <a href="{{ route('books.edit', $book) }}">Edit</a>
                
                <!-- Form Hapus -->
                <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection