<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasien;
use App\Gejala;
use App\Relasi;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Penyakit;
use App\Aturan;
use App\Diagnosa;
use Carbon\Carbon;
use App\HDiagnosa;
use App\RbGejala;
use App\RbPenyakit;
use App\Settingan;
use App\RbAnalisaHasil;

class KonsultasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        if (!is_null(session('nama', null)))
            return redirect('/konsultasi');

        return view('konsultasi.index');
    }

    public function dashboard()
    {
        return view('konsultasi.index1');
    }

    public function konsultasi_p(Request $r)
    {
        /* $pasien = new Pasien();
        $pasien->nama = $r->nama;
        $pasien->alamat = $r->alamat;
        $pasien->no_telp = $r->no_telp;
        $pasien->jenis_sapi = $r->jenis_sapi;
        $pasien->save(); */

        $r->session()->put('nama', $r->nama);
        $r->session()->put('alamat', $r->alamat);
        $r->session()->put('no_telp', $r->no_telp);
        $r->session()->put('jenis_sapi', $r->jenis_sapi);
        // $r->session()->put('id', $pasien->id);

        return redirect('/konsultasi');
    }

    public function konsultasi_g(Request $r)
    {
        if (!isset($r->pertanyaan)) {
            $pertanyaan_pertama = Settingan::find(1);
            // dd($pertanyaan_pertama);
            $id = $pertanyaan_pertama->id_pertanyaan;
            $pertanyaan = RbGejala::where('id', $id)->first();
        } else {
            $first_two = substr($r->pertanyaan, 0, 2);
            if ($first_two == "PK") {
                return redirect('/hasil_analisa?penyakit=' . $r->pertanyaan);
            }
            $pertanyaan = RbGejala::where('id', $r->pertanyaan)->first();
        }
        $data = [
            'question' => $pertanyaan,
        ];

        return view('konsultasi.konsultasi', $data);
    }

    public function hasil_analisa(Request $r)
    {
        $analisa = new RbAnalisaHasil;
        $analisa->nama = session('nama');
        $analisa->alamat = session('alamat');
        $analisa->no_telp = session('no_telp');
        $analisa->jenis_kelamin = session('jenis_sapi');
        $analisa->penyakit = $r->penyakit;
        $analisa->waktu = Carbon::now();
        $analisa->save();

        $data = [
            'penyakit' => RbPenyakit::find($r->penyakit)
        ];
        return view('konsultasi.hasil_analisa', $data);
    }

    public function diagnosa(Request $r)
    {
        // dd(session()->all());
        if (count($r->gejala) == 0) {
            return redirect('/konsultasi')->with(['status' => 'harus memilih minimal satu gejala']);
        }

        //simpan gejala ke diagnosa
        $diagnosa = new Diagnosa;
        $diagnosa->id_pasien = session('id');
        $diagnosa->tanggal = Carbon::now();
        $diagnosa->save();

        foreach ($r->gejala as $gejala) {
            $h_diagnosa = new HDiagnosa();
            $h_diagnosa->id_gejala = $gejala;
            $h_diagnosa->id_diagnosa = $diagnosa->id;
            $h_diagnosa->save();
        }

        //hitung CF
        /* $in = join(',',$r->gejala);
        $cf_diagnosa = DB::select(DB::raw('select id_penyakit, penyakit, sum(cf) as faktor_kepastian from relasi, penyakit where id_gejala in ('.$in.') and penyakit.id=relasi.id_penyakit group by id_penyakit, penyakit order by faktor_kepastian desc'));

        $data = [
            'cf_diagnosa'=>$cf_diagnosa,
            'penyakit'=>Penyakit::find($cf_diagnosa[0]->id_penyakit),
            'gejala'=>Gejala::whereIn('id', $r->gejala)->get(),
            'solusi'=>Aturan::where('id_penyakit', $cf_diagnosa[0]->id_penyakit)->first()->solusi
        ]; */

        return redirect('/diagnosa');
    }

    public function diagnosa_g()
    {
        $diagnosa = Diagnosa::where(['id_pasien' => session('id')])->latest('tanggal')->first();

        // dd($diagnosa);
        $h_diagnosa = HDiagnosa::where('id_diagnosa', $diagnosa->id)->get();

        $list_gejala = [];
        foreach ($h_diagnosa as $diag) {
            array_push($list_gejala, $diag->id_gejala);
        }

        $in = join(',', $list_gejala);

        $cf_diagnosa = DB::select(DB::raw('select id_penyakit, penyakit, sum(cf) as faktor_kepastian from relasi, penyakit where id_gejala in (' . $in . ') and penyakit.id=relasi.id_penyakit group by id_penyakit, penyakit order by faktor_kepastian desc'));

        $data = [
            'no' => 1,
            'no1' => 1,
            'cf_diagnosa' => $cf_diagnosa,
            'penyakit' => Penyakit::find($cf_diagnosa[0]->id_penyakit),
            'gejala' => Gejala::whereIn('id', $list_gejala)->get(),
            'solusi' => Aturan::where('id_penyakit', $cf_diagnosa[0]->id_penyakit)->first()->solusi
        ];

        return view('konsultasi.diagnosa', $data);
    }

    public function print()
    {

        $diagnosa = Diagnosa::where(['id_pasien' => session('id')])->latest('tanggal')->first();

        // dd($diagnosa);
        $h_diagnosa = HDiagnosa::where('id_diagnosa', $diagnosa->id)->get();

        $list_gejala = [];
        foreach ($h_diagnosa as $diag) {
            array_push($list_gejala, $diag->id_gejala);
        }

        $in = join(',', $list_gejala);

        $cf_diagnosa = DB::select(DB::raw('select id_penyakit, penyakit, sum(cf) as faktor_kepastian from relasi, penyakit where id_gejala in (' . $in . ') and penyakit.id=relasi.id_penyakit group by id_penyakit, penyakit order by faktor_kepastian desc'));

        $data = [
            'no' => 1,
            'no1' => 1,
            'cf_diagnosa' => $cf_diagnosa,
            'penyakit' => Penyakit::find($cf_diagnosa[0]->id_penyakit),
            'gejala' => Gejala::whereIn('id', $list_gejala)->get(),
            'solusi' => Aturan::where('id_penyakit', $cf_diagnosa[0]->id_penyakit)->first()->solusi
        ];

        $pdf = \PDF::loadView('konsultasi.print', $data);
        return $pdf->stream();
    }

    public function selesai()
    {
        session()->flush();
        return redirect('/konsul');
    }

    public function penyakit()
    {
        $data = [
            'penyakits' => RbPenyakit::all(),
            'no' => 1
        ];
        return view('konsultasi.penyakit', $data);
    }
    public function tentang()
    {
        return view('konsultasi.tentang');
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
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
