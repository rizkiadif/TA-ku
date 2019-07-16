@extends('master')

@section('content')
<section class="content-header">
  <h1>
    Abadimix
    <small>Ready Mix Concreate</small>
  </h1>
</section>
<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Edit Data Supplier</h3>
    </div>
    <div class="box-body">
      <form role="form" action="/admin/updatesupplier" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$id}}">
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputPassword1">Nama</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nama" name="namasup" value="{{$supplier->namasup}}">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Alamat</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Alamat" name="alamat" value="{{$supplier->alamat}}">
          </div>
           <div class="form-group">
            <label for="exampleInputPassword1">Barang</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Barang" name="barang" value="{{$supplier->barang}}">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">No Telp</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="No Telp" name="notelp" value="{{$supplier->notelp}}">
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Save</button>
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