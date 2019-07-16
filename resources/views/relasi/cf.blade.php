@extends('master')

@section('content')
<section class="content-header">
</section>
<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Data Penyakit</h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-xs-12">
                <h4>Tambah Gejala untuk {{$penyakit->penyakit}}</h4>
                <form action="" class="col-md-4" method="post">
                    @csrf
                    <input type="hidden" name="id_penyakit" value="{{$id}}">
                    <div class="form-group">
                        <select name="id_gejala" class="form-control">
                            @foreach($list_gejala as $row)
                            <option value="{{$row->id}}">{{$row->gejala}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="cf" placeholder="Nilai CF (misal 0.0, 0.5, 1.0)">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                    @if (session('status'))
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Penyakit: </strong> {{session('status')}}
                    </div>
                    @endif
                    <table class="table table-hover">
                        <body><tr>
                        <th>No.</th>
                        <th>Nama Gejala</th>
                        <th>Nilai CF</th>
                        <th>Aksi</th>
                        </tr>
                        @foreach($relasi as $row)
                        <tr>
                        <td>{{$no++}}</td>
                        <td>{{$row->gejala->gejala}}</td>
                        <td>{{$row->cf}}</td>
                        <td>
                            <a href="/pakar/relasi/{{$id}}/hapus/{{$row->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                        </tr>
                        @endforeach
                    </tbody></table>
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