<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Satuan;

class SatuanController extends Controller
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
        $ar_satuan = DB::table('satuan')
                        ->get();
        return view('satuan.index', compact('ar_satuan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('satuan.form');
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
                'jenis'=>'required|unique:satuan',
            ],
            [
                'jenis.required'=>'Nama satuan harus diisi!',
                'jenis.unique'=>'Satuan sudah terdaftar!'
            ]
        );
        $ar_satuan = DB::table('satuan')->insert(
            [
                'jenis'=>$request->jenis,
            ]
            );
            return redirect('/satuan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ar_satuan = DB::table('satuan')
                        ->where('id','=',$id)
                        ->get();
        return view('satuan.form_edit', compact('ar_satuan'));
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
                'jenis'=>'required|unique:satuan',
            ],
            [
                'jenis.required'=>'Nama satuan harus diisi!',
                'jenis.unique'=>'Satuan sudah terdaftar!'
            ]
        );
        DB::table('satuan')->where('id','=',$id)->update(
            [
                'jenis'=>$request->jenis,
            ]
            );
        return redirect('/satuan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ar_satuan=DB::table('satuan')
                    ->where('id','=',$id)
                    ->delete();
        return redirect('/satuan');
    }
}
