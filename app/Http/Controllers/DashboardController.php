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

class DashboardController extends Controller
{
    public function index()
    {
        return view('pasien.indexpasien')->with(['pasien'=>$pasien, 'no'=> $no]);
    }
}
