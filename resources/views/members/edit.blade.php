@extends('layouts.app')

@section('content')
    <h1>Edit Data Anggota</h1>

    <form action="{{ route('members.update', $member) }}" method="POST" novalidate>
        @csrf
        @method('PUT')

        <label>Kode Anggota (Otomatis):</label><br>
        <input type="text" value="{{ $member->member_code }}" readonly style="background-color: #e9ecef;">
        <br><br>

        <label>Nama Lengkap:</label><br>
        <input type="text" name="name" value="{{ old('name', $member->name) }}">
        @error('name')
            <span style="color: red; font-size: 14px;"><br>{{ $message }}</span>
        @enderror
        <br><br>

        <label>No. Telepon:</label><br>
        <input type="text" name="phone" value="{{ old('phone', $member->phone) }}">
        @error('phone')
            <span style="color: red; font-size: 14px;"><br>{{ $message }}</span>
        @enderror
        <br><br>

        <label>Alamat:</label><br>
        <textarea name="address" rows="3">{{ old('address', $member->address) }}</textarea>
        @error('address')
            <span style="color: red; font-size: 14px;"><br>{{ $message }}</span>
        @enderror
        <br><br>

        <button type="submit">Update</button>
        <a href="{{ route('members.index') }}">Batal</a>
    </form>
@endsection