
<!DOCTYPE html>
<html>
<head>
    <title>{{$pasien->nama}}</title>
</head>
<style>
body { font-family: sans-serif; }
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

td {
  font-size: 0.8em;
}

tr:nth-child(even) {background-color: #f2f2f2;}

h2 {
  font-size: 40px;
}

.title { color: #549612; }

.text-center { text-align: center; }

</style>
<body>
    <h1 class="text-center">Konsultasi</h1>
    <h5>Nama  : {{$pasien->nama}}</h5>
    <h5>Alamat : {{$pasien->alamat}}</h5>
    <h5>Tanggal : {{$diagnosa->tanggal}}</h5>

    <h3>Gejala</h3>
    <table class="table table-stripped">
        <tr>
            <td>No</td>
            <td>Gejala</td>
            <td>Nilai CF</td>
        </tr>
        @foreach($gejala as $gjl)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$gjl->gejala}}</td>
            <td>{{$gjl->relasi['cf']}}</td>
        </tr>
        @endforeach
    </table>

    <h3>Hasil diagnosa</h3>
    <table class="table table-stripped">
        <tr>
            <th>No</th>
            <th>Penyakit</th>
            <th>Kepastian</th>
        </tr>
        @foreach($cf_diagnosa as $diagnosa)
        <tr>
            <td>{{$no1++}}</td>
            <td>{{$diagnosa->penyakit}}</td>
            <td>{{number_format($diagnosa->faktor_kepastian * 100, '1', '.', ',')}}%</td>
        </tr>
        @endforeach
    </table>
    <p>
        Kemungkinan besa penyakitnya adalah <b>{{$penyakit->penyakit}}</b>
    </p>
    <p>Deskripsi: {{$penyakit->deskripsi}}</p>
    <div class="row">
        <div class="col-md-12">
            <h4>Solusi</h4>
            <p>
                {{$solusi->solusi}} 
            </p>
        </div>
    </div>
</body>
</html>
