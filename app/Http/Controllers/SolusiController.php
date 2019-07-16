<?php

namespace App\Http\Controllers;

use App\Solusi;
use Illuminate\Http\Request;

class SolusiController extends Controller
{
   public function index()
    {
       
        $perHalaman = 7;
        $solusi = Solusi::paginate($perHalaman);
        $no = ($solusi->currentPage() - 1) * $perHalaman + 1;
        return view('solusi.indexsolusi')->with(['solusi'=>$solusi, 'no'=> $no]);
    }

public function tambah()
    {
       
        return view('solusi.tambahsolusi');
    }

public function store(Request $r)
    {
       $solusi=new Solusi;
       $solusi->solusi=$r->solusi;
       $solusi->save();
        return redirect('/pakar/solusi')->with('status', 'Data Solusi tersimpan');
    }

    public function hapus($id)
    {
      $solusi = \App\Solusi::find($id);

        $solusi->delete();
        return redirect('/pakar/solusi')->with('status', 'Data berhasil dihapus');
    }

    public function edit($id)
    {
      $solusi= Solusi::findOrFail($id);   
      $data=['solusi'=>$solusi, 'id'=>$id];
     return view('solusi.editsolusi',$data);   //
    }

    public function update(Request $r)
    {
        $solusi= Solusi::findOrFail($r->id);
        $solusi->solusi=$r->solusi;
        $solusi->save();
        return redirect('/pakar/solusi')->with('status', 'Update Solusi Tersimpan');
      }
}
