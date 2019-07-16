<?php

namespace App\Http\Controllers;

use App\Pasien;
use App\Diagnosa;
use App\HDiagnosa;
use App\Penyakit;
use App\Aturan;
use App\Gejala;
use DB;
use Illuminate\Http\Request;

class PasienController extends Controller
{

    public function index()
    {
        $perHalaman = 7;
        $pasien = Pasien::paginate($perHalaman);
        $no = ($pasien->currentPage() - 1) * $perHalaman + 1;
        return view('pasien.indexpasien')->with(['pasien'=>$pasien, 'no'=> $no]);
    }

    public function tambah()
    {
        return view('pasien.tambahpasien');
    }

    public function read($id)
    {
        $pasien= Pasien::findOrFail($id);

        $diagnosa = Diagnosa::where(['id_pasien'=>$id])->latest('tanggal')->first();

        // dd($diagnosa);
        $h_diagnosa = HDiagnosa::where('id_diagnosa', $diagnosa->id)->get();
        
        $list_gejala = [];
        foreach($h_diagnosa as $diag) 
        {
            array_push($list_gejala, $diag->id_gejala);
        }

        $in = join(',', $list_gejala);
        
        $cf_diagnosa = DB::select(DB::raw('select id_penyakit, penyakit, sum(cf) as faktor_kepastian from relasi, penyakit where id_gejala in ('.$in.') and penyakit.id=relasi.id_penyakit group by id_penyakit, penyakit order by faktor_kepastian desc'));

        $data = [
            'no'=>1, 
            'no1'=>1,
            'cf_diagnosa'=>$cf_diagnosa,
            'penyakit'=>Penyakit::find($cf_diagnosa[0]->id_penyakit),
            'gejala'=>Gejala::whereIn('id', $list_gejala)->get(),
            'solusi'=>Aturan::where('id_penyakit', $cf_diagnosa[0]->id_penyakit)->first()->solusi,
            'pasien'=>$pasien
        ];

        return view('pasien.diagnosa', $data);
    }

   public function cetak($id)
    {
        $pasien= Pasien::findOrFail($id);

        $diagnosa = Diagnosa::where(['id_pasien'=>$id])->latest('tanggal')->first();

        // dd($diagnosa);
        $h_diagnosa = HDiagnosa::where('id_diagnosa', $diagnosa->id)->get();
        
        $list_gejala = [];
        foreach($h_diagnosa as $diag) 
        {
            array_push($list_gejala, $diag->id_gejala);
        }

        $in = join(',', $list_gejala);
        
        $cf_diagnosa = DB::select(DB::raw('select id_penyakit, penyakit, sum(cf) as faktor_kepastian from relasi, penyakit where id_gejala in ('.$in.') and penyakit.id=relasi.id_penyakit group by id_penyakit, penyakit order by faktor_kepastian desc'));

        $data = [
            'no'=>1, 
            'no1'=>1,
            'cf_diagnosa'=>$cf_diagnosa,
            'penyakit'=>Penyakit::find($cf_diagnosa[0]->id_penyakit),
            'gejala'=>Gejala::whereIn('id', $list_gejala)->get(),
            'solusi'=>Aturan::where('id_penyakit', $cf_diagnosa[0]->id_penyakit)->first()->solusi,
            'pasien'=>$pasien
        ];

        return view('pasien.diagnosa', $data);
    }

    public function store(Request $r)
    {
       $pasien=new Pasien;
       $pasien->nama=$r->nama;
       $pasien->jenis_sapi=$r->jenis_sapi;
       $pasien->save();
        return redirect('/pakar/pasien')->with('status', 'Data Pasien tersimpan');
    }

    public function hapus($id)
    {
        $pasien = \App\Pasien::find($id);

        $pasien->delete();
        return redirect('/pakar/pasien')->with('status', 'Data berhasil dihapus');
    }

    public function edit($id)
    {
      $pasien= Pasien::findOrFail($id);   
      $data=['pasien'=>$pasien, 'id'=>$id];
     return view('pasien.editpasien',$data);   
    }

    public function update(Request $r)
    {
        $pasien= Pasien::findOrFail($r->id);
        $pasien->nama=$r->nama;
        $pasien->jenis_sapi=$r->jenis_sapi;
        $pasien->save();
        return redirect('/pakar/pasien')->with('status', 'Update pasien tersimpan');
    }

    public function print($id)
    {
        $diagnosa = Diagnosa::where(['id_pasien'=>$id])->latest('tanggal')->first();

        // dd($diagnosa);
        $h_diagnosa = HDiagnosa::where('id_diagnosa', $diagnosa->id)->get();
        
        $list_gejala = [];
        foreach($h_diagnosa as $diag)
        {
            array_push($list_gejala, $diag->id_gejala);
        }

        $in = join(',', $list_gejala);
        $cf_diagnosa = DB::select(DB::raw('select id_penyakit, penyakit, sum(cf) as faktor_kepastian from relasi, penyakit where id_gejala in ('.$in.') and penyakit.id=relasi.id_penyakit group by id_penyakit, penyakit order by faktor_kepastian desc'));

        $data = [
            'no'=>1,
            'no1'=>1,
            'cf_diagnosa'=>$cf_diagnosa,
            'penyakit'=>Penyakit::find($cf_diagnosa[0]->id_penyakit),
            'gejala'=>Gejala::whereIn('id', $list_gejala)->get(),
            'solusi'=>Aturan::where('id_penyakit', $cf_diagnosa[0]->id_penyakit)->first()->solusi,
            'pasien'=>$diagnosa->pasien,
            'diagnosa'=>$diagnosa
        ];
        
        $pdf = \PDF::loadView('pasien.print', $data);
        return $pdf->stream();
    }
}
