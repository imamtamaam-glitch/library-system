@extends('layouts.app')

@section('content')
    <h1>Data Peminjaman & Pengembalian</h1>

    @if (session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('borrowings.create') }}">+ Tambah Peminjaman Baru</a>
    <br><br>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Anggota</th>
                <th>Buku Dipinjam (Qty)</th>
                <th>Petugas</th>
                <th>Tgl Pinjam</th>
                <th>Jatuh Tempo</th>
                <th>Tgl Kembali</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($borrowings as $index => $borrowing)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $borrowing->member->name }}</td>
                    <td>
                        @foreach ($borrowing->details as $detail)
                            {{ $detail->book->judul }} ({{ $detail->quantity }} eks)<br>
                        @endforeach
                    </td>
                    <td>{{ $borrowing->user->name }}</td>
                    <td>{{ $borrowing->borrowing_date }}</td>
                    <td>{{ $borrowing->due_date }}</td>
                    <td>{{ $borrowing->return_date ?? '-' }}</td>
                    <td>{{ $borrowing->status === 'borrowed' ? 'Dipinjam' : 'Dikembalikan' }}</td>
                    <td>
                        @if ($borrowing->status === 'borrowed')
                            <form action="{{ route('borrowings.return', $borrowing->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" onclick="return confirm('Proses pengembalian buku ini?')">Kembalikan</button>
                            </form>
                        @else
                            Selesai
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection