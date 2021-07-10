

@php

$jdl = ['No', 'Nama','Stok','Harga','Satuan','Kategori','Produsen'];
$no=1;
@endphp

<h3 align="center">Daftar Produk</h3>

<br>
<br>
<table border="1" align="center" cellpadding="5">
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


    </tr>

    @endforeach
</tbody>

</table>

