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
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <!-- <h3 class="box-title">
              <a href="/pakar/pasien/tambahpasien" type="submit" class="btn btn-info pull-left">Input Data Pasien</a></h3> -->
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            @if (session('status'))
            <div class="alert alert-success">
              <a href="#" class="close" data-dismiss="alert">&times;</a>
              <strong>Pesan: </strong> {{session('status')}}
            </div>
            @endif
            <table class="table table-hover">
              <body><tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Jenis Sapi</th>
                <th>Aksi</th>
              </tr>
              @foreach($pasien as $row)
              <tr>
                <td>{{$no++}}</td>
                <td>{{$row->nama}}</td>
                <td>{{$row->jenis_sapi}}</td>
                <td>
                    <div class="btn-group-veritical">

                    <a href="/pakar/pasien/detail/{{$row->id}}" type="button" class="btn btn-info"><i class="fa fa-eye"></i></a>
                    <!-- <a href="/pakar/pasien/editpasien/{{$row->id}}" type="button" class="btn btn-warning"><i class="fa fa-edit"></i></a> -->
                    <a href="/pakar/hapuspasien/{{$row->id}}" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
      {{$pasien->links()}}
    </div>
    <!-- /.box-footer-->
  </div>
  <!-- /.box -->
</section>
@endsection