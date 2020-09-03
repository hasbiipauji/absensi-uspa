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

Route::get('/', 'RoleController@check_role')->middleware('verified');;
Route::get('/home', 'HomeController@index')->name('home');;


Route::group(['middleware' => ['auth', 'checkRole:admin', 'verified']], function () {
    Route::resource('/jabatan', 'JabatanController');
    Route::resource('/pegawai', 'PegawaiController');
    Route::get('/export_all', 'ExportController@export_all');
    Route::post('/export_all_pilihan', 'ExportController@export_all_pilihan')->name('export_all_pilihan');
    Route::POST('/export_all/export_all_pilihan_excel', 'ExportController@export_all_pilihan_excel')->name('export.export_all_pilihan_excel');
});
Route::group(['middleware' => ['auth', 'verified']], function () {

    Route::get('/export_month', 'ExportController@export_month');
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/pegawai', 'PegawaiController@index');
    Route::resource('/absensi', 'AbsensiController');

    Route::get('/export', 'ExportController@index');
    Route::get('/export/export_excel', 'ExportController@export_excel');
    Route::post('/export/pilihan', 'ExportController@pilihan')->name('export.pilihan');
    Route::POST('/export/export_excel_pilihan', 'ExportController@export_excel_pilihan')->name('export.export_excel_pilihan');
    Route::get('/export/export_excel_hari_ini', 'ExportController@export_excel_hari_ini')->name('export.export_excel_hari_ini');

    Route::get('/location/{id}', 'Locationcontroller@show');

    // Route dibawah untuk cetak pdf pegawai
    Route::get('/laporan-pdf', 'PdfController@createPDF')->name('pdf');

    Route::get('/pdf-absensi', 'PdfAbsensiController@createPDF')->name('pdf-absensi');
    Route::get('/pdf-absensi_hari_ini', 'PdfAbsensiController@createPDF_hari_ini')->name('pdf-absensi_hari_ini');
    Route::post('/pdf-absensi_pilihan_user', 'PdfAbsensiController@createPDF_pilihan_user')->name('pdf-absensi_pilihan_user');
    Route::post('/pdf-absensi_pilihan_admin', 'PdfAbsensiController@createPDF_pilihan_admin')->name('pdf-absensi_pilihan_admin');
});

// Route::get('/location', function ()
// {
//     return redirect('/');
// } );