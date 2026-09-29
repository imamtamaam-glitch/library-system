@extends('layouts.app')
@section('title', 'Dashboard')

@foreach($books as $book)
    <h3>Judul: {{ $book->title }}</h3>
    <p>ID: {{ $book->id }}</p>
    <p>Penulis: {{ $book->author }}</p>
    <p>Tahun: {{ $book->year }}</p>
    <p>Stok: {{ $book->stock }}</p>
    <hr>
@endforeach