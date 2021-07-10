@extends('layout.index')
@section('content')

@php
    $rs1 = App\models\Satuan::all();
    $rs2 = App\models\Produsen::all();
    $rs3 = App\models\Kategori::all();
    
@endphp

<h3>Form Edit Produk</h3>

@foreach ($ar_produk as $prdk )
    

<form action="{{route('produk.update',$prdk->id)}}" method="POST" enctype="multipart/form-data">
@csrf
@method('put')

<div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" name="nama" id="" class="form-control @error('nama')
        is-invalid @enderror" value="{{$prdk->nama}}">
        <div class="invalid-feedback">
            @error('nama')
                {{$message}}
            @enderror    
        </div>
        
</div>
<div class="form-group">
    <label for="stok">Stok Produk</label>
    <input type="text" name="stok" id="" class="form-control @error('stok')
        is-invalid @enderror" value="{{$prdk->stok}}">
        <div class="invalid-feedback">
            @error('stok')
                {{$message}}
            @enderror    
        </div>
</div>
<div class="form-group">
    <label for="harga">harga </label>
    <input type="text" name="harga" id="" class="form-control @error('harga')
        is-invalid @enderror" value="{{$prdk->harga}}">
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
      @php
          $sel1 = ($satuan->id == $prdk->satuan_id) ? 'selected' :"";
      @endphp
      
      <option value="{{$satuan->id}}" {{$sel1}}>{{$satuan->jenis}}</option>

      @endforeach
      

    </select>
</div>
<div class="form-group">
    <label for="produsen">produsen</label>
    <select class="form-control" name="idprodusen">
      <option value=""> -Pilih produsen- </option>
      @foreach ($rs2 as $pro)
      @php
          $sel2 = ($pro->id == $prdk->idprodusen) ? 'selected' :"";
      @endphp
      <option value="{{$pro->id}}" {{$sel2}}>{{$pro->nama}}</option>

      @endforeach
      

    </select>
</div>

<div class="form-group">
    <label for="kategori">kategori</label>
    <select class="form-control" name="idkategori">
      <option value=""> -Pilih kategori- </option>
      @foreach ($rs3 as $ktgr)
      @php
          $sel3 = ($ktgr->id == $prdk->idkategori) ? 'selected' :"";
      @endphp
      
      <option value="{{$ktgr->id}}" {{$sel3}}>{{$ktgr->nama}}</option>

      @endforeach
      

    </select>
</div>



<div class="form-group">
    <label for="foto">foto Produk</label>
    <input type="file" name="foto" id="" class="form-control">
</div>

<button class="btn-primary btn-sm" name="proses" type="submit">Submit</button>
<button class="btn-warning btn-sm" name="unproses" type="submit">Batal</button>
</form>
@endforeach
@endsection
