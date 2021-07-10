@extends('layout.index')
@section('content')
    
   
@php
    $jdl = ['No', 'Kategori','Action'];
    $no=1;
@endphp

<h3 style="text-align: center; margin-bottom:10px">Daftar Kategori</h3>
<a class="btn btn-primary btn-md" href="{{route('kategori.create')}}" role="button">Tambah Kategori</a>
<br>
<br>

<div class="container cust">
    <table class="table table-striped" style="text-align: center">

        <thead>
            <tr>
                @foreach ( $jdl as $judul )
                    <th>{{$judul}}</th>    
                @endforeach
                
            </tr>
        </thead>

        <tbody>
            @foreach ($ar_kategori as $ktgr )
                
            
            <tr>
                <td>{{$no++}}</td>
                <td>{{$ktgr->nama}}</td>


                <td>
                    <form action="{{route('kategori.destroy',$ktgr->id)}}" method="POST">
                        @csrf
                        @method('delete')
    
                    
                    <a class="btn btn-primary btn-md" href="{{route('kategori.edit',$ktgr->id)}}" >Edit</a>
                    <button class=" btn btn-danger btn-md" name="proses" type="submit" onclick="return confirm('Data akan Dihapus?')">Hapus</button>
                    
                    </form>
    
                </td>

            </tr>

            @endforeach
        </tbody>

    </table>
</div>

@endsection