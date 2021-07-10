@extends('layout.index')
@section('content')

<h3>Form Penambahan Satuan</h3>

<form action="{{route('satuan.store')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="jenis">Jenis Satuan</label>
        <input type="text" name="jenis" id="" class="form-control @error('jenis')
        is-invalid @enderror" value="{{old('jenis')}}">

        <div class="invalid-feedback">
            @error('jenis')
                {{$message}}
            @enderror    
        </div>
    </div>
    
    {{-- <button class="btn-primary btn-sm" name="proses" type="submit">Submit</button> --}}
    <button class=" btn btn-primary btn-sm" name="proses" type="submit">Submit</button>
    <a class=" btn btn-warning btn-sm" href="{{route('satuan.index')}}">Cancel</a>
</form>
    
@endsection