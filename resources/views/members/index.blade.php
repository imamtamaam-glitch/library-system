@extends('layouts.app')

@section('content')
    <h1>Daftar Anggota Perpustakaan</h1>

    @if (session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('members.create') }}">+ Tambah Anggota</a>
    <br><br>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Anggota</th>
                <th>Nama</th>
                <th>No. Telepon</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $index => $member)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $member->member_code }}</td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->phone }}</td>
                    <td>{{ $member->address }}</td>
                    <td>
                        <a href="{{ route('members.edit', $member) }}">Edit</a>
                        <form action="{{ route('members.destroy', $member) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Hapus anggota ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection