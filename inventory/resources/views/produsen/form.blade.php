@extends('layout.index')
@section('content')

<h3>Form Pendaftaran Produsen</h3>

{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error )
                <li>
                    {{$error}}
                </li>
                
            @endforeach
        </ul>
    </div>
@endif --}}

<form action="{{route('produsen.store')}}" method="POST">
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
    <div class="form-group">
        <label for="lokasi">Lokasi Produsen</label>
        <input type="text" name="lokasi" id="" class="form-control @error('lokasi')
        is-invalid @enderror" value="{{old('lokasi')}}">
        <div class="invalid-feedback">
            @error('lokasi')
                {{$message}}
            @enderror    
        </div>
    </div>
    <div class="form-group">
        <label for="cp">Contact Person </label>
        <input type="text" name="cp" id="" class="form-control @error('cp')
        is-invalid @enderror" value="{{old('cp')}}">
        <div class="invalid-feedback">
            @error('cp')
                {{$message}}
            @enderror    
        </div>
    </div>
    <div class="form-group">
        <label for="email"> Email</label>
        <input type="text" name="email" id="" class="form-control @error('email')
        is-invalid @enderror" value="{{old('email')}}">
        <div class="invalid-feedback">
            @error('email')
                {{$message}}
            @enderror    
        </div>
    </div>
    <button class=" btn btn-primary btn-sm" name="proses" type="submit">Submit</button>
    <a class=" btn btn-warning btn-sm" href="{{route('produsen.index')}}">Cancel</a>
</form>
    
@endsection