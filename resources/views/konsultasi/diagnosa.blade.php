@extends('konsultasi.master')

@section('content')
<section class="content-header">
</section>
<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Data Gejala</h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">Konsultasi</h3>
                <h5>Nama  : {{session('nama')}}</h5>
                <h5>Alamat : {{session('alamat')}}</h5>
                <h5>Tanggal : {{date("d-m-Y")}}</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h4>Gejala</h4>
                <table class="table table-stripped">
                    <tr>
                        <td>No</td>
                        <td>Gejala</td>
                        <!-- <td>Nilai CF</td> -->
                    </tr>
                    @foreach($gejala as $gjl)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$gjl->gejala}}</td>
                        <!-- <td>{{$gjl->relasi['cf']}}</td> -->
                    </tr>
                    @endforeach
                </table>

                <h4>Hasil diagnosa</h4>
                <table class="table table-stripped">
                    <tr>
                        <th>No</th>
                        <th>Penyakit</th>
                        <!-- <th>Kepastian</th> -->
                    </tr>
                    @foreach($cf_diagnosa as $diagnosa)
                    <tr>
                        <td>{{$no1++}}</td>
                        <td>{{$diagnosa->penyakit}}</td>
                        <!-- <td>{{number_format($diagnosa->faktor_kepastian * 100, '1', '.', ',')}}%</td> -->
                    </tr>
                    @endforeach
                </table>
                <p>
                    Kemungkinan besar penyakitnya adalah <b>{{$penyakit->penyakit}}</b>
                </p>
                <p>Deskripsi: {{$penyakit->deskripsi}}</p>
                <div class="row">
                    <div class="col-md-12">
                        <h4>Solusi</h4>
                        <p>
                            {{$solusi->solusi}} 
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a href="/print-diagnosa" class="btn btn-info">Print</a>
                        <a href="/selesai" class="btn btn-primary">Selesai</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
    </div>
    <!-- /.box-footer-->
  </div>
  <!-- /.box -->
</section>
@endsection