<?php

namespace App\Http\Controllers;

use App\Gejala;
use Illuminate\Http\Request;

class GejalaController extends Controller
{
   public function index()
    {
       
        $perHalaman = 7;
        $gejala = Gejala::paginate($perHalaman);
        $no = ($gejala->currentPage() - 1) * $perHalaman + 1;
        return view('gejala.indexgejala')->with(['gejala'=>$gejala, 'no'=> $no]);
    }

public function tambah()
    {
       
        return view('gejala.tambahgejala');
    }

public function store(Request $r)
    {
       $gejala=new Gejala;
       $gejala->gejala=$r->gejala;
       $gejala->save();
        return redirect('/pakar/gejala')->with('status', 'Data Gejala tersimpan');
    }

    public function hapus($id)
    {
      $gejala = \App\Gejala::find($id);

        $gejala->delete();
        return redirect('/pakar/gejala')->with('status', 'Data berhasil dihapus');
    }

    public function edit($id)
    {
      $gejala= Gejala::findOrFail($id);   
      $data=['gejala'=>$gejala, 'id'=>$id];
     return view('gejala.editgejala',$data);   
    }

    public function update(Request $r)
    {
        $gejala= Gejala::findOrFail($r->id);
        $gejala->gejala=$r->gejala;
        $gejala->save();
        return redirect('/pakar/gejala')->with('status', 'Update Gejala Tersimpan');
      }
}