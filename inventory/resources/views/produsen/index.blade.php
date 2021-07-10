@extends('layout.index')
@section('content')
    
@php
    $jdl = ['No', 'Nama','Lokasi','Cp','Email','Action'];
    $no=1;
@endphp

<h3 style="text-align: center; margin-bottom:10px">Daftar Produsen</h3>
<a class="btn btn-primary btn-md" href="{{route('produsen.create')}}" role="button">Tambah Produsen</a>
<a class="btn btn-primary btn-md" href="{{asset('expdf')}}" role="button">Downlaod as PDF</a>
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
            @foreach ($ar_produsen as $prdsn )
                
            
            <tr>
                <td>{{$no++}}</td>
                <td>{{$prdsn->nama}}</td>
                <td>{{$prdsn->lokasi}}</td>
                <td>{{$prdsn->cp}}</td>
                <td>{{$prdsn->email}}</td>

                <td>
                    <form action="{{route('produsen.destroy',$prdsn->id)}}" method="POST">
                        @csrf
                        @method('delete')
    
                    <a class="btn btn-primary btn-sm" href="{{route('produsen.show',$prdsn->id)}}" >Detail </a>
                    <a class="btn btn-primary btn-sm" href="{{route('produsen.edit',$prdsn->id)}}" >Edit</a>
                    <button class=" btn btn-danger btn-sm" name="proses" type="submit" onclick="return confirm('Data akan Dihapus?')">Hapus</button>
                    
                    </form>
    
                </td>

            </tr>

            @endforeach
        </tbody>

    </table>
</div>

@endsection