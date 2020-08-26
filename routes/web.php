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
    //Alert::success('Success Title', 'Login Berhasil');

    return view('template_backend.master');
})->middleware('auth');

Auth::routes(['verify'=> true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::resource('/absensi', 'AbsensiController')->middleware('auth');

// Route::get('/location', function ()
// {
//     return redirect('/');
// } );

Route::get('/location/{id}', 'Locationcontroller@show' );


Route::get('/geo', function () {
    return view('geocode');   
});

Route::resource('/jabatan', 'JabatanController');
Route::resource('/pegawai', 'PegawaiController');

