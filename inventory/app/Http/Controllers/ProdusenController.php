<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Produsen;
use Barryvdh\DomPDF\Facade as PDF;

class ProdusenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $ar_produsen = DB::table('produsen')->get();

        return view('produsen.index', compact('ar_produsen'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produsen.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validasi = $request->validate(
            [
                'nama'=>'required|unique:produsen',
                'lokasi'=>'required',
                'cp'=>'required|numeric',
                'email'=>'required|email',

            ],
            [
                'nama.required'=>'Nama produsen wajib diisi!',
                'lokasi.required'=>'Lokasi wajib diisi!',
                'cp.required'=>'Contact Person wajib diisi!',
                'email.required'=>'Email wajib diisi!',
                'nama.unique'=>'Nama produsen sudah terdaftar!',
                'cp.numeric'=>'Hanya menerima inputan nomor!',
                'email.email'=>'Masukkan email yang benar!'
            ]

        );

        DB::table('produsen')->insert(
            [
                'nama'=>$request->nama,
                'lokasi'=>$request->lokasi,
                'cp'=>$request->cp,
                'email'=>$request->email,
            ]
        );
        return redirect('/produsen'); 
    }  

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ar_produsen = DB::table('produsen')
                        ->where('id','=',$id)
                        ->get();

        return view('produsen.show', compact('ar_produsen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ar_produsen = DB::table('produsen')
                        ->where('id','=',$id)
                        ->get();

        return view('produsen.form_edit', compact('ar_produsen'));
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
        $validasi = $request->validate(
            [
                'nama'=>'required',
                'lokasi'=>'required',
                'cp'=>'required|numeric',
                'email'=>'required|email',

            ],
            [
                'nama.required'=>'Nama produsen wajib diisi!',
                'lokasi.required'=>'Lokasi wajib diisi!',
                'cp.required'=>'Contact Person wajib diisi!',
                'email.required'=>'Email wajib diisi!',
                // 'nama.unique'=>'Nama produsen sudah terdaftar!',
                'cp.numeric'=>'Hanya menerima inputan nomor!',
                'email.email'=>'Masukkan email yang benar!'
            ]

        );
        DB::table('produsen')->where('id','=',$id)->update(
            [
                'nama'=>$request->nama,
                'lokasi'=>$request->lokasi,
                'cp'=>$request->cp,
                'email'=>$request->email,
            ]
        );
        return redirect('/produsen'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ar_produsen=DB::table('produsen')
                    ->where('id','=',$id)
                    ->delete();
        return redirect('/produsen');
    }


    // export to pdf
    public function expdf()
    {
        //
        $ar_produsen = DB::table('produsen')->get();

        $pdf = PDF::loadView('produsen.daftarProdusen',['ar_produsen'=>$ar_produsen]);
        return $pdf->download('Daftar_Produsen.pdf');

    }
}
