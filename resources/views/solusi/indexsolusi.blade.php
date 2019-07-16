@extends('master')

@section('content')
<section class="content-header">
</section>
<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Data Solusi</h3>
    </div>
    <div class="box-body">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">
              <a href="/pakar/solusi/tambahsolusi" type="submit" class="btn btn-info pull-left">Input Data Solusi</a></h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            @if (session('status'))
            <div class="alert alert-success">
              <a href="#" class="close" data-dismiss="alert">&times;</a>
              <strong>Solusi: </strong> {{session('status')}}
            </div>
            @endif
            <table class="table table-hover">
              <body><tr>
                <th>No.</th>
                <th>Nama Solusi</th>
                <th width="100">Aksi</th>
              </tr>
              @foreach($solusi as $row)
              <tr>
                <td>{{$no++}}</td>
                <td>{{$row->solusi}}</td>
                <td>
                    <div class="btn-group-veritical">
                    <a href="/pakar/solusi/editsolusi/{{$row->id}}" type="button" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                    <a href="/pakar/hapussolusi/{{$row->id}}" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </div>
                  </td>
              </tr>
              @endforeach
            </tbody></table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      {{$solusi->links()}}
    </div>
    <!-- /.box-footer-->
  </div>
  <!-- /.box -->
</section>
@endsection