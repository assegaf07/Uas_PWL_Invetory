@extends('layout.index')
@section('content')

<h3>Form Edit Kategori</h3>

@foreach ($ar_kategori as $ktgr )
    


<form action="{{route('kategori.update',$ktgr->id)}}" method="POST">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="" class="form-control @error('nama')
        is-invalid @enderror" value="{{$ktgr->nama}}">
        <div class="invalid-feedback">
            @error('nama')
                {{$message}}
            @enderror    
        </div>
    </div>
    
    <button class="btn-primary btn-sm" name="proses" type="submit">Submit</button>
<button class="btn-warning btn-sm" name="unproses" type="submit">Batal</button>
</form>
@endforeach
    
@endsection