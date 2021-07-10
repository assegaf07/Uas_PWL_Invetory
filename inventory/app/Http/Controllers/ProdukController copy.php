<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Produk;
use Barryvdh\DomPDF\Facade as PDF;


class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ar_produk = DB::table('produk')
                    ->join('kategori','kategori.id','=', 'produk.idkategori')
                    ->join('satuan','satuan.id','=','produk.satuan_id')
                    ->join('produsen','produsen.id','=','produk.idprodusen')
                    ->select('produk.*','satuan.jenis','kategori.nama as kat','produsen.nama as pro')
                    ->get();
        
        return view('produk.index', compact('ar_produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produk.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!empty($request->foto)){
            $request->validate([
                'foto' => 'image |mimes:png,jpg|max:2048'
            ]);
            $filename=$request->nama.'.'.$request->foto->extension();
            $request->foto->move(public_path('images'),$filename);
        }else{
            $filename='';
        }
        DB::table('produk')->insert(
            [
                // 'nama field'=>$request->nama elemnt,

                'nama'=>$request->nama,
                'stok'=>$request->stok,
                'harga'=>$request->harga,
                'satuan_id'=>$request->satuan_id,
                'idprodusen'=>$request->idprodusen,
                'idkategori'=>$request->idkategori,
                // 'foto'=>$request->foto,
                'foto'=>$filename,

            ]
        );
        return redirect('/produk');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ar_produk = DB::table('produk')
                    ->join('kategori','kategori.id','=', 'produk.idkategori')
                    ->join('satuan','satuan.id','=','produk.satuan_id')
                    ->join('produsen','produsen.id','=','produk.idprodusen')
                    ->select('produk.*','satuan.jenis','kategori.nama as kat','produsen.nama as pro')
                    ->where('produk.id','=',$id)
                    ->get();
        
        return view('produk.show', compact('ar_produk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ar_produk = DB::table('produk')
                        ->where('id','=',$id)
                        ->get();
        return view('produk.form_edit',compact('ar_produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if(!empty($request->foto)){
            $request->validate([
                'foto' => 'image |mimes:png,jpg|max:2048'
            ]);
            $filename=$request->nama.'.'.$request->foto->extension();
            $request->foto->move(public_path('images'),$filename);
        }else{
            $filename='';
        }
        DB::table('produk')->where('id','=',$id)->update(
            [
                // 'nama field'=>$request->nama elemnt,

                'nama'=>$request->nama,
                'stok'=>$request->stok,
                'harga'=>$request->harga,
                'satuan_id'=>$request->satuan_id,
                'idprodusen'=>$request->idprodusen,
                'idkategori'=>$request->idkategori,
                'foto'=>$filename,

            ]
        );
        return redirect('/produk'.'/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ar_produk=DB::table('produk')
                    ->where('id','=',$id)
                    ->delete();
        return redirect('/produk');
    }

    // Code For PDF Export
    // error dibawah ga ngaruh

    public function generatePDF()
    {
        $data = [
            'title' => 'Tes generate pdf',
            'date' => date('m/d/Y')
        ];
          
        $pdf = PDF::loadView('produk.myPDF', $data);
    
        return $pdf->download('itsolutionstuff.pdf');
    }

    public function expdf2()
    {
        //
        $ar_produk = DB::table('produk')
                    ->join('kategori','kategori.id','=', 'produk.idkategori')
                    ->join('satuan','satuan.id','=','produk.satuan_id')
                    ->join('produsen','produsen.id','=','produk.idprodusen')
                    ->select('produk.*','satuan.jenis','kategori.nama as kat','produsen.nama as pro')
                    ->get();
                $pdf = PDF::loadView('produk.daftarProduk',['ar_produk'=>$ar_produk]);
        
        return $pdf->download('Daftar_Produk.pdf');
    }
}
