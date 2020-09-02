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

Auth::routes(['verify' => true]);

Route::get('/', 'RoleController@check_role')->middleware('auth', 'verified');;

Route::get('/dashboard', 'HomeController@index')->name('home')->middleware('verified');
// 
Route::group(['middleware' => ['auth', 'checkRole:admin', 'verified']], function () {
    Route::resource('/jabatan', 'JabatanController');
    Route::resource('/pegawai', 'PegawaiController');
});

Route::get('/dashboard', 'DashboardController@index');
Route::resource('/absensi', 'AbsensiController')->middleware('auth');

Route::get('/export', 'ExportController@index');
Route::get('/export/export_excel', 'ExportController@export_excel');
Route::post('/export/pilihan', 'ExportController@pilihan')
    ->name('export.pilihan');
Route::POST('/export/export_excel_pilihan', 'ExportController@export_excel_pilihan')
    ->name('export.export_excel_pilihan');
Route::get('/export/export_excel_hari_ini', 'ExportController@export_excel_hari_ini')
    ->name('export.export_excel_hari_ini');

Route::get('/location/{id}', 'Locationcontroller@show');

// Route dibawah untuk cetak pdf pegawai
Route::get('/laporan-pdf', 'PdfController@createPDF')->name('pdf');

Route::get('/pdf-absensi', 'PdfAbsensiController@createPDF')->name('pdf-absensi');
Route::get('/pdf-absensi_hari_ini', 'PdfAbsensiController@createPDF_hari_ini')->name('pdf-absensi_hari_ini');


// Route::get('/location', function ()
// {
//     return redirect('/');
// } );