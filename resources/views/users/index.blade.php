@extends('layouts.app')

@section('content')
    <h1>Pengelolaan Pengguna (Khusus Admin)</h1>
    <a href="{{ route('books.index') }}">← Kembali ke Daftar Buku</a>
    <br><br>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $u)
                <tr>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                    <td><strong>{{ $u->role }}</strong></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection