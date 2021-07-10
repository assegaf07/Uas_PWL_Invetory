@extends('layout.index')
@section('content')
    @php
        $jdl = ['No', 'Nama','Stok','Harga','Satuan','Kategori','Produsen','Foto','Action'];
        $no=1;
    @endphp

<h3 style="text-align: center; margin-bottom:10px">Daftar Produk</h3>
<a class="btn btn-primary btn-md" href="{{route('produk.create')}}" role="button">Tambah Produk</a>
<a class="btn btn-primary btn-md" href="{{asset('expdf2')}}" role="button">Downlaod as PDF</a>
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
                @foreach ($ar_produk as $prdk )
                    
                
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$prdk->nama}}</td>
                    <td>{{$prdk->stok}}</td>
                    <td>{{$prdk->harga}}</td>
                    <td>{{$prdk->jenis}}</td>
                    <td>{{$prdk->kat}}</td>
                    <td>{{$prdk->pro}}</td>

                    <td width="20%">
                
                        @empty($prdk->foto)
                         <img src="{{asset('images')}}/coding.jpg" width="80%" />
         
                         @else
         
                         <img src="{{asset('images')}}/{{$prdk->foto}}" width="80%" />
         
                         @endempty
                         
         
                     </td>
                    <td>
                        <form action="{{route('produk.destroy',$prdk->id)}}" method="POST">
                            @csrf
                            @method('delete')
        
                        <a class="btn btn-primary btn-sm" href="{{route('produk.show',$prdk->id)}}" >Detail </a>
                        <a class="btn btn-primary btn-sm" href="{{route('produk.edit',$prdk->id)}}" >Edit</a>
                        <button class=" btn btn-danger btn-sm" name="proses" type="submit" onclick="return confirm('Data akan Dihapus?')">Hapus</button>
                        
                        </form>
        
                    </td>

                </tr>

                @endforeach
            </tbody>

        </table>
    </div>

@endsection