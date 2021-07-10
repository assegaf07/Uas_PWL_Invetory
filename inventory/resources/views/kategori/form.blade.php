@extends('layout.index')
@section('content')

<h3>Form Penambahan Kategori</h3>

<form action="{{route('kategori.store')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="" class="form-control @error('nama')
        is-invalid @enderror" value="{{old('nama')}}">
        <div class="invalid-feedback">
            @error('nama')
                {{$message}}
            @enderror    
        </div>
    </div>
    
    <button class=" btn btn-primary btn-sm" name="proses" type="submit">Submit</button>
    <a class=" btn btn-warning btn-sm" href="{{url()->previous()}}">Cancel</a>
</form>
    
@endsection