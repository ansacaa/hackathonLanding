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

Route::get('/', function () {
    return view('main');
})->name('index');

Auth::routes(['register' => false]); // disabled registering new users

Route::get('/registro', 'TeamController@create')->name('teams.create');
Route::post('/registro', 'TeamController@store')->name('teams.store');
Route::get('/confirmar/{uuid}', 'TeamController@confirm')->name('teams.confirm');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/equipos', 'TeamController@index')->name('teams');
    Route::get('/asistencia', 'TeamController@assistance')->name('teams.assistance');
    Route::get('/equipos/{team}', 'TeamController@show')->name('teams.show');
    Route::put('/equipos/{team}', 'TeamController@update')->name('teams.update');
    Route::delete('/equipos/{team}', 'TeamController@delete')->name('teams.delete');

    Route::put('/equipos/{team}/approve', 'TeamController@approve')->name('teams.approve');
    Route::get('/equipos/{team}/reenviar', 'TeamController@resend')->name('teams.resend');
    Route::get('/asistencia/{uuid}', 'TeamController@checkin')->name('teams.checkin');
});

Route::get('{any}', function($any) {
    return redirect(route('index'));
});