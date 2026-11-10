@extends('layouts.app')

@section('content')
    <h1>Daftar Buku</h1>
    <hr>
    @if (session('success'))
    <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border: 1px solid #c3e6cb; border-radius: 5px;">
        {{ session('success') }}
    </div>
    @endif
    
    <table border="1" cellpadding="10">
        <tr>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Tahun</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        @foreach($books as $book)
        <tr>
            <td>{{ $book->judul }}</td>
            <td>{{ $book->penulis }}</td>
            <td>{{ $book->tahunterbit }}</td>
            <td>{{ $book->category?->name ?? 'Belum ada kategori' }}</td>
            <td>{{ $book->stock }}</td>
            <td>
                
                <a href="{{ route('books.edit', $book) }}">Edit</a>
                
                <form id="delete-form-{{ $book->id }}" action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="confirmDelete('{{ $book->id }}')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <a href="{{ url('books/create') }}" style="border: 4px double #0d6efd; padding: 6px 12px; text-decoration: none; color: #0d6efd; border-radius: 4px; display: inline-block; margin-bottom: 15px; font-weight: bold;">
            + Tambah Buku
        </a>

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
    
        <div>
            @can('manage-users')
                <a href="{{ route('users.index') }}" style="border: 4px double #29bd16; padding: 6px 12px; text-decoration: none; color: #21a918; border-radius: 4px; display: inline-block; margin-bottom: 15px; font-weight: bold;">[Kelola Pengguna]</a>
            @endcan

        </div>
        <form action="{{ route('logout') }}" method="POST" style="border: 4px double #c71313; padding: 6px 12px; text-decoration: none; color: #b11016; border-radius: 4px; display: inline-block; margin-bottom: 15px; font-weight: bold;">
                @csrf
                <button type="submit">Logout</button>
            </form>
    </div>

@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Yakin mau dihapus?',
            text: "Data buku yang dihapus tidak dapat dikembalikan!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        })
    }
</script>