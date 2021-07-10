@extends('layout.index')
@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Selamat Datang !</h1>
            <p class="lead">di Sistem Informasi Inventory PT. Sehat Bersama OYE</p>
            <hr class="my-4">
            
            <a class="btn btn-primary btn-lg" href="{{route('produk.index')}}" role="button">Lihat Daftar Produk</a>
          </div>
    </div>
@endsection