@extends('layouts.app')

@section('content')
    <h1>Dashboard Sistem Informasi Perpustakaan</h1>
    <p>Selamat datang, <strong>{{ auth()->user()->name }}</strong> ({{ ucfirst(auth()->user()->role) }})</p>

    <table border="1" cellpadding="12" cellspacing="0">
        <tr>
            <th>Total Kategori</th>
            <th>Total Judul Buku</th>
            <th>Total Anggota</th>
            <th>Total Transaksi</th>
            <th>Sedang Dipinjam</th>
        </tr>
        <tr style="text-align: center; font-size: 20px; font-weight: bold;">
            <td>{{ $totalCategories }}</td>
            <td>{{ $totalBooks }}</td>
            <td>{{ $totalMembers }}</td>
            <td>{{ $totalBorrowings }}</td>
            <td>{{ $activeBorrowings }}</td>
        </tr>
    </table>
@endsection