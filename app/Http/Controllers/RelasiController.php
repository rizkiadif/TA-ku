<?php

namespace App\Http\Controllers;

use App\Relasi;
use Illuminate\Http\Request;
use App\Penyakit;
use App\Gejala;

class RelasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perHalaman = 7;
        $penyakit = Penyakit::paginate($perHalaman);
        $data = [
            'penyakit'=>$penyakit,
            'no'=>($penyakit->currentPage() - 1) * $perHalaman + 1
        ];
        return view('relasi.index', $data);
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
        $relasi = new Relasi;
        $relasi->id_penyakit = $request->id_penyakit;
        $relasi->id_gejala = $request->id_gejala;
        $relasi->cf = $request->cf;
        $relasi->save();
        return redirect('/pakar/relasi/'.$request->id_penyakit)->with('status', 'Data tersimpan');
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
            'relasi'=>$penyakit->relasi(),
            'no'=>1,
            'id'=>$id,
            'list_gejala'=>Gejala::all()
        ];
        return view('relasi.cf', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Relasi  $relasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Relasi $relasi)
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
    public function update(Request $request, Relasi $relasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Relasi  $relasi
     * @return \Illuminate\Http\Response
     */
    public function hapus($id, $id2)
    {
        Relasi::findOrFail($id2)->delete();
        return redirect('/pakar/relasi/'.$id)->with('status', 'Data terhapus');
    }
}
