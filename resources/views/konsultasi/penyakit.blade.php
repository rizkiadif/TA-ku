@extends('konsultasi.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <h3>Penyakit Umum Ternak Sapi</h3>
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Penyakit</th>
                    <th>Keterangan</th>
                    <th>Solusi</th>
                </tr>
                @foreach($penyakits as $penyakit)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$penyakit->penyakit}}</td>
                    <td>{{$penyakit->keterangan}}</td>
                    <td>{{$penyakit->solusi}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@stop