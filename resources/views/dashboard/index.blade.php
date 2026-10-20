@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h1 class="mb-0">Wellcome to the library yall</h1>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table border="1" cellpadding="10"">
                    <thead class="table-dark">
                        <tr>
                            <th>Judul Buku</th>
                            <th>Penulis Buku</th>
                            <th>Tahun terbit buku</th>
                            <th>Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($books as $book)
                        <tr>
                             <td>{{ $book->judul }}</td>
                             <td>{{ $book->penulis }}</td>
                             <td>{{ $book->tahunterbit }}</td>
                             <td>{{ $book->stock }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">Data buku belum tersedia.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection