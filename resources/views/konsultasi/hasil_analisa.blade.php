@extends('konsultasi.master')

@section('content')
<section class="content-header">
</section>
<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">Data Pengguna</h4>
                <h5>Nama  : {{session('nama')}}</h5>
                <h5>Alamat : {{session('alamat')}}</h5>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <h4>Diagnosa anda sebagai berikut:</h4>
                <b>Penyakit:</b>
                <p>{{$penyakit->penyakit}}</p>
                <b>Keterangan:</b>
                <p>{{$penyakit->keterangan}}</p>
                <b>Solusi:</b>
                <p>{{$penyakit->solusi}}</p>
                <a href="/selesai" class="btn btn-primary">Selesai</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @if(session('status'))
                <div class="alert alert-danger" role="alert">
                    {{session('status')}}
                </div>
                @endif
            </div>
        </div>
    </div>
  </div>
</section>
@endsection