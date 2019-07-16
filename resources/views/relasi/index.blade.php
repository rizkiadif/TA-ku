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
                <th>Nama Penyakit</th>
                <th>Deskripsi</th>
              </tr>
              @foreach($penyakit as $row)
              <tr>
                <td>{{$no++}}</td>
                <td><a href="/pakar/relasi/{{$row->id}}">{{$row->penyakit}}</a></td>
                <td>{{$row->deskripsi}}</td>
              </tr>
              @endforeach
            </tbody></table>
      </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      {{$penyakit->links()}}
    </div>
    <!-- /.box-footer-->
  </div>
  <!-- /.box -->
</section>
@endsection