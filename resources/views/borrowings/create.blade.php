@extends('layouts.app')

@section('content')
    <h1>Form Peminjaman Buku</h1>

    <form action="{{ route('borrowings.store') }}" method="POST" novalidate>
        @csrf

        <label>Pilih Anggota:</label><br>
        <select name="member_id">
            <option value="">-- Pilih Anggota --</option>
            @foreach ($members as $member)
                <option value="{{ $member->id }}" {{ old('member_id') == $member->id ? 'selected' : '' }}>
                    {{ $member->member_code }} - {{ $member->name }}
                </option>
            @endforeach
        </select>
        @error('member_id')
            <span style="color: red; font-size: 14px;"><br>{{ $message }}</span>
        @enderror
        <br><br>

        <label>Pilih Buku:</label><br>
        <select name="book_id">
            <option value="">-- Pilih Buku --</option>
            @foreach ($books as $book)
                <option value="{{ $book->id }}" {{ old('book_id') == $book->id ? 'selected' : '' }}>
                    {{ $book->judul }} (Stok: {{ $book->stock }})
                </option>
            @endforeach
        </select>
        @error('book_id')
            <span style="color: red; font-size: 14px;"><br>{{ $message }}</span>
        @enderror
        <br><br>

        <label>Jumlah Pinjam:</label><br>
        <input type="number" name="quantity" value="{{ old('quantity', 1) }}" min="1">
        @error('quantity')
            <span style="color: red; font-size: 14px;"><br>{{ $message }}</span>
        @enderror
        <br><br>

        <button type="submit">Simpan Peminjaman</button>
        <a href="{{ route('borrowings.index') }}">Batal</a>
    </form>
@endsection