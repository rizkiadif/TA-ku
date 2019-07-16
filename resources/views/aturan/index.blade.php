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
                <h4>Set solusi penyakit</h4>
                <form action="/pakar/aturan/simpan" class="col-md-4" method="post">
                    @csrf
                    <div class="form-group">
                        <select name="id_penyakit" class="form-control">
                            @foreach($list_penyakit as $row)
                            <option value="{{$row->id}}">{{$row->penyakit}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                            <select name="id_solusi" class="form-control">
                                @foreach($list_solusi as $row)
                                <option value="{{$row->id}}">{{$row->solusi}}</option>
                                @endforeach
                            </select>
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
                        <th>Penyakit</th>
                        <th>Solusi</th>
                        <th>Aksi</th>
                        </tr>
                        @foreach($list_aturan as $row)
                        <tr>
                        <td>{{$no++}}</td>
                        <td>{{$row->penyakit->penyakit}}</td>
                        <td>{{$row->solusi->solusi}}</td>
                        <td>
                            <a href="/pakar/aturan/hapus/{{$row->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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