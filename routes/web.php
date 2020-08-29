<?php

use RealRashid\SweetAlert\Facades\Alert;

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

    return view('template_backend.master');
})->middleware('auth');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/export', 'ExportController@index');
Route::get('/export/export_excel', 'ExportController@export_excel');
Route::post('/export/pilihan', 'ExportController@pilihan')->name('export.pilihan');
Route::POST('/export/export_excel_pilihan', 'ExportController@export_excel_pilihan')->name('export.export_excel_pilihan');



Route::resource('/jabatan', 'JabatanController');
Route::resource('/pegawai', 'PegawaiController');

Route::resource('/absensi', 'AbsensiController')->middleware('auth');

// Route::get('/location', function ()
// {
//     return redirect('/');
// } );

Route::get('/location/{id}', 'Locationcontroller@show');
