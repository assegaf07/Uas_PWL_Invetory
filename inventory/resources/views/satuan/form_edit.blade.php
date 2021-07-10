@extends('layout.index')
@section('content')

<h3>Form Edit satuan</h3>

@foreach ($ar_satuan as $stn )
    


<form action="{{route('satuan.update',$stn->id)}}" method="POST">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="jenis">Jenis</label>
        <input type="text" name="jenis" id="" class="form-control @error('jenis')
        is-invalid @enderror" value="{{$stn->jenis}}">
        
        <div class="invalid-feedback">
            @error('jenis')
                {{$message}}
            @enderror    
        </div>
    </div>
    
    <button class="btn btn-primary btn-sm" name="proses" type="submit">Submit</button>
    <a class="btn btn-warning btn-sm" href="{{route('satuan.index')}}">Cancel</a>
</form>
@endforeach
    
@endsection