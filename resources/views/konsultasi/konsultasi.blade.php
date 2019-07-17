@extends('konsultasi.master')

@section('content')
<section class="content-header">
</section>
<!-- Main content -->
<section class="content">
    <div class="box">
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">Data Pengguna</h4>
                <h5>Nama  : {{session('nama')}}</h5>
                <h5>Alamat : {{session('alamat')}}</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @if(session('status'))
                <div class="alert alert-danger" role="alert">
                    {{session('status')}}
                </div>
                @endif
            </div>
        </div>
    </div>
    </div>
    <h4>Jawab pertanyaan berikut</h4>
    <div class="col-md-8 col-md-offset-2">
        <div class="box">
            <div class="box-body">
                <div>
                    {{$question->pertanyaan}}
                </div>
                <div style="margin-top: 20px">
                    <form action="" method="get" class="pull-left" style="margin-right: 20px">
                        <input type="hidden" name="pertanyaan" value="{{$question->ifno}}">
                        <button type="submit" class="btn btn-danger">Tidak</button>
                    </form>
                    <form action="" method="get" class="form-inline">
                        <input type="hidden" name="pertanyaan" value="{{$question->ifyes}}">
                        <button type="submit" class="btn btn-success">Ya</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection