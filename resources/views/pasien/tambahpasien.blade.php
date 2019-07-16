@extends('master')

@section('content')
<section class="content-header">
</section>
<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Tambah Data Pasien</h3>
    </div>
    <div class="box-body">
      <form role="form" action="/pakar/pasien/tambahpasien" method="post">
        @csrf
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputPassword1">Nama</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nama" name="nama">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Kelompok</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Kelompok" name="kelompok">
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      Footer
    </div>
    <!-- /.box-footer-->
  </div>
  <!-- /.box -->
</section>
@endsection