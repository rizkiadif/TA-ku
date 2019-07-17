<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', 'LoginController@login')->name('login');
Route::post('/login', 'LoginController@proses_login');

Route::group(['middleware' => 'auth'], function () {

	Route::get('/pakar', 'LoginController@index');
	Route::get('/logout', 'LoginController@logout');

	Route::get('/pakar', 'Controller@pakar');
	Route::get('/pakar/tambahgejala', 'GejalaController@tambah');

	Route::get('/pakar/pasien', 'PasienController@index');
	Route::get('/pakar/pasien/tambahpasien', 'PasienController@tambah');
	Route::post('/pakar/pasien/tambahpasien', 'PasienController@store');
	Route::get('/pakar/pasien/detail/{id}', 'PasienController@read');
	Route::get('/pakar/pasien/print/{id}', 'PasienController@print');
	Route::get('/pakar/pasien/editpasien/{id}', 'PasienController@edit');
	Route::post('/pakar/updatepasien', 'PasienController@update');
	Route::get('/pakar/hapuspasien/{id}', 'PasienController@hapus');

	Route::get('/pakar/gejala', 'GejalaController@index');
	Route::get('/pakar/gejala/tambahgejala', 'GejalaController@tambah');
	Route::post('/pakar/gejala/tambahgejala', 'GejalaController@store');
	Route::get('/pakar/gejala/editgejala/{id}', 'GejalaController@edit');
	Route::post('/pakar/updategejala', 'GejalaController@update');
	Route::get('/pakar/hapusgejala/{id}', 'GejalaController@hapus');

	Route::get('/pakar/penyakit', 'PenyakitController@index');
	Route::get('/pakar/penyakit/tambahpenyakit', 'PenyakitController@tambah');
	Route::post('/pakar/penyakit/tambahpenyakit', 'PenyakitController@store');
	Route::get('/pakar/penyakit/editpenyakit/{id}', 'PenyakitController@edit');
	Route::post('/pakar/updatepenyakit', 'PenyakitController@update');
	Route::get('/pakar/hapuspenyakit/{id}', 'PenyakitController@hapus');

	Route::get('/pakar/relasi', 'RelasiController@index');
	Route::get('/pakar/relasi/{id}', 'RelasiController@show');
	Route::post('/pakar/relasi/{id}', 'RelasiController@simpan');
	Route::get('/pakar/relasi/{id}/hapus/{id2}', 'RelasiController@hapus');

	Route::get('/pakar/aturan', 'AturanController@index');
	Route::get('/pakar/aturan/simpan', 'AturanController@simpan');
	Route::get('/pakar/aturan/{id}', 'AturanController@show');
	Route::post('/pakar/aturan/{id}', 'AturanController@simpan');
	Route::get('/pakar/aturan/hapus/{id2}', 'AturanController@hapus');

	Route::get('/pakar/solusi', 'SolusiController@index');
	Route::get('/pakar/solusi/tambahsolusi', 'SolusiController@tambah');
	Route::post('/pakar/solusi/tambahsolusi', 'SolusiController@store');
	Route::get('/pakar/solusi/editsolusi/{id}', 'SolusiController@edit');
	Route::post('/pakar/updatesolusi', 'SolusiController@update');
	Route::get('/pakar/hapussolusi/{id}', 'SolusiController@hapus');
});

Route::get('/', 'KonsultasiController@dashboard');
Route::get('/konsul', 'KonsultasiController@index');
Route::post('/konsultasi', 'KonsultasiController@konsultasi_p');
Route::get('/konsultasi', 'KonsultasiController@konsultasi_g');
Route::get('/tentang', 'KonsultasiController@tentang');
Route::post('/diagnosa', 'KonsultasiController@diagnosa');
Route::get('/diagnosa', 'KonsultasiController@diagnosa_g');
Route::get('/print-diagnosa', 'KonsultasiController@print');
Route::get('/penyakit', 'KonsultasiController@penyakit');
Route::get('/selesai', 'KonsultasiController@selesai');
Route::get('/hasil_analisa', 'KonsultasiController@hasil_analisa');

Route::get('/penyakit/gejala', 'GejalaController@index');
// Route::get('admin/pasien', 'pasienController@index');
// Route::get('/admin/supplier/tambahsupplier', 'SupplierController@tambah');
// Route::post('/admin/supplier/tambahsupplier', 'SupplierController@simpan');
// Route::get('/admin/supplier/editsupplier/{id}', 'SupplierController@edit');
// Route::post('/admin/updatesupplier', 'SupplierController@updatesupplier');
// Route::get('/admin/hapussupplier/{id}', 'SupplierController@hapus');
