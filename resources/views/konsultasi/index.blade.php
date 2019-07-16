@extends('konsultasi.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h3>Konsultasi</h3>
        <form action="/konsultasi" method="post" class="col-md-6">
            @csrf
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control">
            </div>
            <div class="form-group">
                <label for="no_telp">No Telp</label>
                <input type="text" name="no_telp" id="no_telp" class="form-control">
            </div>
            <div class="form-group">
                <label for="jenis_sapi">Jenis Klamin</label>
                <select name="jenis_sapi" class="form-control" id="jenis_sapi">
                    <option>Laki-laki</option>
                    <option>Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@stop