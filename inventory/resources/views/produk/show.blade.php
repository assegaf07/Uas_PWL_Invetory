@extends('layout.index')
@section('content')

    @foreach ($ar_produk as $prdk)

    <div class="card" style="width: 18rem;">
        {{-- <img src="{{asset('images')}}/{{$prdk->foto}}" class="card-img-top" alt="..."> --}}
        @empty($prdk->foto)
            <img src="{{asset('images')}}/coding.jpg" class="card-img-top"/>

            @else

            <img src="{{asset('images')}}/{{$prdk->foto}}" class="card-img-top" />

        @endempty
        <div class="card-body">
          <h5 class="card-title">{{$prdk->nama}}</h5>
          <p class="card-text">
              Stok = {{$prdk->stok}}
              <br>Harga = {{$prdk->harga}}
              <br>Satuan = {{$prdk->jenis}}
              <br>Produsen = {{$prdk->pro}}
              <br>Kategori = {{$prdk->kat}}
              
            
              
          </p>
          <a href="{{url('/produk')}}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
        
    @endforeach
    

@endsection