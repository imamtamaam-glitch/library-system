@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    <h2>Daftar Buku</h2>
    <ul>
        @foreach($books as $book)
            <li>
                <a href="/books/{{ $book['id'] }}">{{ $book['judul'] }}</a>
            </li>
        @endforeach
    </ul>
@endsection