<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title> 
</head>
<body>
    <header>
        <h1>Library System</h1>
        <nav style="margin-bottom: 15px; padding-bottom: 10px; border-bottom: 1px solid #ccc;">
            <a href="{{ route('dashboard') }}">Dashboard</a> |
            <a href="{{ route('categories.index') }}">Kategori</a> |
            <a href="{{ route('books.index') }}">Buku</a> |
            <a href="{{ route('members.index') }}">Anggota</a> |
            <a href="{{ route('borrowings.index') }}">Peminjaman</a>

            @can('manage-users')
                | <a href="{{ route('users.index') }}">Kelola Pengguna</a>
            @endcan

            <form action="{{ route('logout') }}" method="POST" style="display: inline; float: right;">
                @csrf
                <span>({{ auth()->user()->name }} - {{ auth()->user()->role }})</span>
                <button type="submit">Logout</button>
            </form>
        </nav>
        <hr>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <hr>
        <p>Library System</p>
    </footer>
</body>
</html>