@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    <h2>Halaman Dashboard</h2>
    <p>Wellcome di Sistem Informasi Perpustakaan.</p>
    <ul>
        <li>Total Buku: {{ $totalBooks }}</li>
        <li>Total Kategori: {{ $totalCategories }}</li>
        <li>Total Member: {{ $totalMembers }}</li>
    </ul>
@endsection