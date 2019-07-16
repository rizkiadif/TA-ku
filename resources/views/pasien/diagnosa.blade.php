@extends('master')

@section('content')
<section class="content-header">
</section>
<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Data Pasien</h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header">
                        <h3>Pasien</h3>
                    </div>
                    <div class="box-body">
                        <h4>Nama   : {{$pasien->nama}}</h4>
                        <h4>Alamat : {{$pasien->alamat}}</h4>
                        <h4>No Tlp : {{$pasien->no_telp}}</h4>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3>Gejala</h3>
                <table class="table table-stripped">
                    <tr>
                        <td>No</td>
                        <td>Gejala</td>
                        <td>Nilai CF</td>
                    </tr>
                    @foreach($gejala as $gjl)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$gjl->gejala}}</td>
                        <td>{{$gjl->relasi['cf']}}</td>
                    </tr>
                    @endforeach
                </table>

                <h3>Hasil diagnosa</h3>
                <table class="table table-stripped">
                    <tr>
                        <th>No</th>
                        <th>Penyakit</th>
                        <th>Kepastian</th>
                    </tr>
                    @foreach($cf_diagnosa as $diagnosa)
                    <tr>
                        <td>{{$no1++}}</td>
                        <td>{{$diagnosa->penyakit}}</td>
                        <td>{{number_format($diagnosa->faktor_kepastian * 100, '1', '.', ',')}}%</td>
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

                <a href="/pakar/pasien/print/{{$pasien->id}}" type="button" class="btn btn-info">
                    <!-- <i class="fa fa-eye"></i> -->
                    print
                </a>

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