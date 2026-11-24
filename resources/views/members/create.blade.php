@extends('layouts.app')

@section('content')
    <h1>Tambah Anggota Baru</h1>

    <form action="{{ route('members.store') }}" method="POST" novalidate>
        @csrf

        <label>Nama Lengkap:</label><br>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name')
            <span style="color: red; font-size: 14px;"><br>{{ $message }}</span>
        @enderror
        <br><br>

        <label>No. Telepon:</label><br>
        <input type="text" name="phone" value="{{ old('phone') }}">
        @error('phone')
            <span style="color: red; font-size: 14px;"><br>{{ $message }}</span>
        @enderror
        <br><br>

        <label>Alamat:</label><br>
        <textarea name="address" rows="3">{{ old('address') }}</textarea>
        @error('address')
            <span style="color: red; font-size: 14px;"><br>{{ $message }}</span>
        @enderror
        <br><br>

        <button type="submit">Simpan</button>
        <a href="{{ route('members.index') }}">Batal</a>
    </form>
@endsection