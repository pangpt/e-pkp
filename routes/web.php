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

Route::get('/penilaian', 'PenilaianKinerjaController@index')->name('penilaian.index');
Route::get('/penilaian/create', 'PenilaianKinerjaController@create')->name('penilaian.create');
Route::post('/penilaian/input', 'PenilaianKinerjaController@inputPenilaian')->name('penilaian.input');

Route::get('/masterdata/indikator', 'IndikatorKegiatanController@index')->name('indikator.index');
Route::get('/masterdata/indikator/create', 'IndikatorKegiatanController@create')->name('indikator.create');
Route::post('/masterdata/indikator/input', 'IndikatorKegiatanController@inputIndikator')->name('indikator.inputIndikator');
