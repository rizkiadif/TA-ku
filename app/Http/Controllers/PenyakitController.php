<?php

namespace App\Http\Controllers;

use App\Penyakit;
use Illuminate\Http\Request;

class PenyakitController extends Controller
{
    public function index()
    {
       
        $perHalaman = 7;
        $penyakit = Penyakit::paginate($perHalaman);
        $no = ($penyakit->currentPage() - 1) * $perHalaman + 1;
        return view('penyakit.indexpenyakit')->with(['penyakit'=>$penyakit, 'no'=> $no]);
    }

public function tambah()
    {
       
        return view('penyakit.tambahpenyakit');
    }

public function store(Request $r)
    {
       $penyakit=new Penyakit;
       $penyakit->penyakit=$r->penyakit;
       $penyakit->deskripsi=$r->deskripsi;
       $penyakit->save();
        return redirect('/pakar/penyakit')->with('status', 'Data Penyakit tersimpan');
    }

    public function hapus($id)   {
      $penyakit = \App\Penyakit::find($id);

        $penyakit->delete();
        return redirect('/pakar/penyakit')->with('status', 'Data berhasil dihapus');
    }

    public function edit($id)
    {
      $penyakit= Penyakit::findOrFail($id);   
      $data=['penyakit'=>$penyakit, 'id'=>$id];
     return view('penyakit.editpenyakit',$data);
    }

    public function update(Request $r)
    {
        $penyakit= Penyakit::findOrFail($r->id);
        $penyakit->penyakit=$r->penyakit;
        $penyakit->deskripsi=$r->deskripsi;
        $penyakit->save();
        return redirect('/pakar/penyakit')->with('status', 'Update Penyakit Tersimpan');
      }
}
