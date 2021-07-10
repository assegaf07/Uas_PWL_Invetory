
@php
    $jdl = ['No', 'Nama','Lokasi','Cp','Email'];
    $no=1;
@endphp

<h3 style="text-align: center; margin-bottom:10px">Daftar Produsen</h3>


<div class="container cust">
    <table border="1" align="center" cellpadding="5">

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


            </tr>

            @endforeach
        </tbody>

    </table>
</div>
