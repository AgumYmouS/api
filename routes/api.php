<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('mahasiswa', 'MahasiswaController@index');
// Route::get('mahasiswa/{id}', 'MahasiswaController@show');
Route::post('mahasiswa', 'MahasiswaController@create');
Route::delete('/mahasiswa/{id}', 'MahasiswaController@delete');
Route::get('mahasiswa/search', 'MahasiswaController@serachByDateAndMk');
