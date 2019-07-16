@extends('master')

@section('content')
<section class="content-header">
</section>
<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Edit Data Penyakit</h3>
    </div>
    <div class="box-body">
      <form role="form" action="/pakar/updatepenyakit" method="post">
         @csrf
        <input type="hidden" name="id" value="{{$id}}">
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputPassword1">Nama Penyakit</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="penyakit" name="penyakit" value="{{$penyakit->penyakit}}">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Diskripsi</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Deskripsi" name="deskripsi" value="{{$penyakit->deskripsi}}">
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