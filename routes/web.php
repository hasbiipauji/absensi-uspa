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



Auth::routes(['verify'=> true]);


Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {

    Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
    Route::resource('/jabatan', 'JabatanController');
    Route::resource('/pegawai', 'PegawaiController');
    Route::get('/', function(){
        return redirect('/home');
    });
});
Route::resource('/absensi', 'AbsensiController');



// Route::get('/location', function ()
// {
//     return redirect('/');
// } );

Route::get('/location/{id}', 'Locationcontroller@show' );

Route::get('/geo', function () {
    return view('geocode');
});

//Route::get('/pdf', 'PdfController@showPdf');
// Route dibawah untuk cetak pdf pegawai
Route::get('/laporan-pdf', 'PdfController@createPDF')->name('pdf');

Route::get('/pdf-absensi', 'PdfAbsensiController@createPDF')->name('pdf-absensi');
