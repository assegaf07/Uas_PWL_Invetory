@extends('layout.index')
@section('content')

@php
    $rs1 = App\models\Satuan::all();
    $rs2 = App\models\Produsen::all();
    $rs3 = App\models\Kategori::all();
    
@endphp

<h3>Form Tambah Produk</h3>

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

<form action="{{route('produk.store')}}" method="POST" enctype="multipart/form-data">
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
    <label for="stok">Stok Produk</label>
    <input type="text" name="stok" id="" class="form-control @error('stok')
    is-invalid @enderror" value="{{old('stok')}}">

    <div class="invalid-feedback">
        @error('stok')
            {{$message}}
        @enderror    
    </div>

</div>
<div class="form-group">
    <label for="harga">harga </label>
    <input type="text" name="harga" id=""class="form-control @error('harga')
    is-invalid @enderror" value="{{old('harga')}}">
    

    <div class="invalid-feedback">
        @error('harga')
            {{$message}}
        @enderror    
    </div>

</div>

<div class="form-group">
    <label for="satuan">Satuan</label>
    <select class="form-control @error('satuan_id')
    is-invalid @enderror" name="satuan_id">
      <option value=""> -Pilih satuan- </option>
      @foreach ($rs1 as $satuan)
      
      <option value="{{$satuan->id}} {{old($satuan->id)}} ">{{$satuan->jenis}}</option>

      @endforeach
     
    </select>
    <div class="invalid-feedback">
        @error('satuan_id')
            {{$message}}
        @enderror    
    </div>
</div>
<div class="form-group">
    <label for="produsen">produsen</label>
    <select class="form-control @error('idprodusen')
    is-invalid @enderror" name="idprodusen">
      <option value=""> -Pilih produsen- </option>
      @foreach ($rs2 as $pro)
      
      <option value="{{$pro->id}}">{{$pro->nama}}</option>

      @endforeach
      
      

    </select>
    <div class="invalid-feedback">
        @error('idprodusen')
            {{$message}}
        @enderror    
    </div>
</div>

<div class="form-group">
    <label for="kategori">kategori</label>
    <select class="form-control @error('idkategori')
    is-invalid @enderror" name="idkategori">
      <option value=""> -Pilih kategori- </option>
      @foreach ($rs3 as $ktgr)
      
      <option value="{{$ktgr->id}}">{{$ktgr->nama}}</option>

      @endforeach
      
      

    </select>
    <div class="invalid-feedback">
        @error('idkategori')
            {{$message}}
        @enderror    
    </div>
</div>



<div class="form-group">
    <label for="foto">foto Produk</label>
    <input type="file" name="foto" id="" class="form-control @error('foto')
    is-invalid @enderror">
    <div class="invalid-feedback">
        @error('foto')
            {{$message}}
        @enderror    
    </div>
</div>

<button class=" btn btn-primary btn-sm" name="proses" type="submit">Submit</button>
{{-- <a class="btn btn-warning btn-sm" href="{{url()->previous()}}">Cancel</a> --}}
<a class=" btn btn-warning btn-sm" href="{{route('produk.index')}}">Cancel</a>
</form>
@endsection
