@extends('layout.index')
@section('content')
    
   
@php
    $jdl = ['No', 'Satuan','Action'];
    $no=1;
@endphp

<h3 style="text-align: center; margin-bottom:10px">Daftar Satuan</h3>
<a class="btn btn-primary btn-md" href="{{route('satuan.create')}}" role="button">Tambah Satuan</a>
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
            @foreach ($ar_satuan as $stn )
                
            
            <tr>
                <td>{{$no++}}</td>
                <td>{{$stn->jenis}}</td>


                <td>
                    <form action="{{route('satuan.destroy',$stn->id)}}" method="POST">
                        @csrf
                        @method('delete')
    
                    
                    <a class="btn btn-primary btn-md" href="{{route('satuan.edit',$stn->id)}}" >Edit</a>
                    <button class=" btn btn-danger btn-md" name="proses" type="submit" onclick="return confirm('Data akan Dihapus?')">Hapus</button>
                    
                    </form>
    
                </td>

            </tr>

            @endforeach
        </tbody>

    </table>
</div>

@endsection