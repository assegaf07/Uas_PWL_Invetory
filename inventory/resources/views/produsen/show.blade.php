@extends('layout.index')
@section('content')

    @foreach ($ar_produsen as $prdsn)

    <div class="card" style="width: 18rem;">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{$prdsn->nama}}</h5>
          <p class="card-text">
              Lokasi = {{$prdsn->lokasi}}
              <br>Contact Person = {{$prdsn->cp}}
              <br>Email = {{$prdsn->email}}

              
            
              
          </p>
          <a href="{{url('/produsen')}}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
        
    @endforeach
    

@endsection