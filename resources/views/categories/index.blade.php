@extends('layouts.app')

@section('title', 'Data Kategori')

@section('content')
    <div class="content-card">
        <h1>Data Kategori</h1>
        <p>Kelola Kategori produk skincare Artist.Inc</p>
        <a href="{{route ('categories.create')}}"><button>Tambah Kategori</button></a>
    </div>

@endsection