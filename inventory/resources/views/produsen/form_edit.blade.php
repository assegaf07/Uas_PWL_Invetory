@extends('layout.index')
@section('content')

<h3>Form Edit Produsen</h3>
@foreach ($ar_produsen as $prdsn )
    


<form action="{{route('produsen.update', $prdsn->id)}}" method="POST">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="" class="form-control @error('nama')
        is-invalid @enderror" value="{{$prdsn->nama}}">
        <div class="invalid-feedback">
            @error('nama')
                {{$message}}
            @enderror    
        </div>
    </div>
    <div class="form-group">
        <label for="lokasi">Lokasi Produsen</label>
        <input type="text" name="lokasi" id="" class="form-control @error('lokasi')
        is-invalid @enderror"  value="{{$prdsn->lokasi}}">
        <div class="invalid-feedback">
            @error('lokasi')
                {{$message}}
            @enderror    
        </div>
    </div>
    <div class="form-group">
        <label for="cp">Contact Person </label>
        <input type="text" name="cp" id="" class="form-control @error('cp')
        is-invalid @enderror"  value="{{$prdsn->cp}}">
        <div class="invalid-feedback">
            @error('cp')
                {{$message}}
            @enderror    
        </div>
    </div>
    <div class="form-group">
        <label for="email"> Email</label>
        <input type="text" name="email" id="" class="form-control @error('email')
        is-invalid @enderror"  value="{{$prdsn->email}}">
        <div class="invalid-feedback">
            @error('email')
                {{$message}}
            @enderror    
        </div>
    </div>
    <button class="btn-primary btn-sm" name="proses" type="submit">Submit</button>
    <a class=" btn btn-warning btn-sm" href="{{route('produsen.index')}}">Cancel</a>
</form>
@endforeach
    
@endsection