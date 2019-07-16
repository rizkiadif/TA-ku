@extends('konsultasi.master')

@section('content')
<section class="content-header">
</section>
<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Data Gejala</h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">Konsultasi</h3>
                <h5>Nama  : {{session('nama')}}</h5>
                <h5>Alamat : {{session('alamat')}}</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h4>Pilih Gejala </h4>
                @if(session('status'))
                <div class="alert alert-danger" role="alert">
                    {{session('status')}}
                </div>
                @endif
                <form action="/diagnosa" method="post">
                    @csrf
                    <table class="table table-responsive table-stripped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gejala</th>
                                <th>Iya</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($gejala as $gjl) 
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$gjl->gejala}}</td>
                                <td>
                                    <input type="checkbox" name="gejala[{{$gjl->id}}]" id="id_gejala_{{$gjl->id}}" value="{{$gjl->id}}">
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary pull-right">Diagnosa</button>
                </form>
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