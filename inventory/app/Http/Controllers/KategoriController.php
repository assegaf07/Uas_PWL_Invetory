<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kategori;

class KategoriController extends Controller
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
        $ar_kategori = DB::table('kategori')
                        ->get();
        return view('kategori.index', compact('ar_kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('kategori.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate(
            [
                'nama'=>'required|unique:kategori',
            
            ],
            [
                'nama.required'=>'Nama kategori wajib diisi!',
                'nama.unique'=>'Kategori sudah terdaftar!'
            ]
        );
        $ar_kategori = DB::table('kategori')->insert(
            [
                'nama'=>$request->nama,
            ]
            );
            return redirect('/kategori');
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
        $ar_kategori = DB::table('kategori')
                        ->where('id','=',$id)
                        ->get();
        return view('kategori.form_edit', compact('ar_kategori'));
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
        $validate = $request->validate(
            [
                'nama'=>'required',
            
            ],
            [
                'nama.required'=>'Nama kategori wajib diisi!',
                // 'nama.unique'=>'Kategori sudah terdaftar!'
            ]
        );
        DB::table('kategori')->where('id','=',$id)->update(
            [
                'nama'=>$request->nama,
            ]
            );
        return redirect('/kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ar_kategori=DB::table('kategori')
                    ->where('id','=',$id)
                    ->delete();
        return redirect('/kategori');
    }
}
