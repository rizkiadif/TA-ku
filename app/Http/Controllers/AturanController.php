<?php

namespace App\Http\Controllers;

use App\Aturan;
use Illuminate\Http\Request;
use App\Penyakit;
use App\Solusi;

class AturanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'list_penyakit'=>Penyakit::all(),
            'list_solusi'=>Solusi::all(),
            'list_aturan'=>Aturan::all(),
            'no'=>1
        ];
        return view('aturan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function simpan(Request $request)
    {
        $aturan = new Aturan;
        $aturan->id_penyakit = $request->id_penyakit;
        $aturan->id_solusi = $request->id_solusi;
        $aturan->save();
        return redirect('/pakar/aturan')->with('status', 'Data tersimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Relasi  $relasi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penyakit = Penyakit::where('id', $id)->firstOrFail();
        $data = [
            'penyakit'=>$penyakit,
            'relasi'=>$penyakit->aturan(),
            'no'=>1,
            'id'=>$id,
            'list_solusi'=>Solusi::all()
        ];
        return view('aturan.aturan', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Relasi  $relasi
     * @return \Illuminate\Http\Response
     */
    public function edit(aturan $aturan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Relasi  $relasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aturan $aturan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Relasi  $relasi
     * @return \Illuminate\Http\Response
     */
    public function hapus($id)
    {
        Aturan::findOrFail($id)->delete();
        return redirect('/pakar/aturan')->with('status', 'Data terhapus');
    }
}
