<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/pkp/index', function () {
    return view('pkp.index');
});

Route::get('/pkp/create', function () {
    return view('pkp.create');
});

Route::get('/loginpage', 'LoginController@loginpage')->name('loginpage');
Route::post('/login', 'LoginController@login')->name('login');

Route::group(['middleware' => 'ceklogin'], function() {
    Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
    Route::get('/penilaian', 'PenilaianKinerjaController@index')->name('penilaian.index');
    Route::get('/penilaian/create', 'PenilaianKinerjaController@create')->name('penilaian.create');
    Route::post('/penilaian/input', 'PenilaianKinerjaController@inputPenilaian')->name('penilaian.input');
    Route::post('/penilaian/action', 'PenilaianKinerjaController@actionPenilaian')->name('tabledit.action');

    Route::get('penliaian/print', 'PenilaianKinerjaController@print')->name('cetak.pkp');

    Route::post('/penilaian/edit/{id}', 'PenilaianKinerjaController@editPKP')->name('penilaian.edit');
    Route::get('/penilaian/hapus/{id}', 'PenilaianKinerjaController@hapus')->name('penilaian.hapus');

    Route::get('/masterdata/indikator', 'IndikatorKegiatanController@index')->name('indikator.index');
    Route::get('/masterdata/indikator/create', 'IndikatorKegiatanController@create')->name('indikator.create');
    Route::post('/masterdata/indikator/input', 'IndikatorKegiatanController@inputIndikator')->name('indikator.inputIndikator');
    Route::get('/unitkerja', 'MasterController@unitkerja')->name('unitkerja.index');
    Route::post('/unitkerja/edit', 'MasterController@editUnitKerja')->name('unitkerja.edit');
    Route::get('/atasan', 'MasterController@atasan')->name('atasan.index');
    Route::get('/atasan/create', 'MasterController@createAtasan')->name('atasan.create');
    Route::post('/atasan/input', 'MasterController@inputAtasan')->name('atasan.input');

    Route::get('/akun', 'AkunController@akun')->name('akun');
    Route::post('/akun/edit', 'AkunController@editAkun')->name('akun.edit');

    Route::get('/pegawai', 'PegawaiController@index')->name('pegawai.index');
    Route::get('/pegawai/create', 'PegawaiController@create')->name('pegawai.create');
    Route::post('/pegawai/input', 'PegawaiController@input')->name('pegawai.input');




});

Route::get('/logout', 'LoginController@logout')->name('logout');




// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
