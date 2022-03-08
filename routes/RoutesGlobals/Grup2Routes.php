<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['GestioInstitut:GestioInstitut.view']], function () {
    Route::resource('/management/Gestio-Interna/alumnes', AlumnoController::class)->parameters(['alumnos' => 'alumnos'])->names('alumnes')->middleware('auth');
    Route::post('/management/Gestio-central/alumnes/eliminacio', 'AlumnoController@multipledelete')
    ->name('alumnes.deleteall')->middleware('auth');

    Route::resource('/management/Gestio-Interna/professors', ProfesorController::class)->parameters(['professors' => 'professors'])->names('professors')->middleware('auth');
    Route::post('/management/Gestio-central/professors/eliminacio', 'ProfesorController@multipledelete')
    ->name('professors.deleteall')->middleware('auth');

    Route::resource('/management/Gestio-interna/grups', GrupoClaseController::class)->parameters(['grups' => 'grup'])->names('grups');
    Route::post('/management/Gestio-central/grups/eliminacio', 'GrupoClaseController@multipledelete')
    ->name('grups.deleteall')->middleware('auth');
});


Route::put('/management/Gestio-interna/propostes/valoracio/{id}','PropuestaController@updateValoracio')->name('propostesValoracio')->middleware('auth');

Route::resource('/management/Gestio-interna/propostes', PropuestaController::class)->parameters(['propostes' => 'proposta'])->names('propostes')->middleware('auth');
    
Route::get('/propostes/{idProposta}', 'PropuestaController@getDisplay')->name('propostes');
Route::post('/management/Gestio-interna/propostes/{idProposta}', 'PropuestaController@unirse')->name('propostes.unirse')->middleware('auth');
Route::put('/management/Gestio-interna/propostes/acceptar/{idProposta}', 'PropuestaController@acceptar')->name('propostes.acceptar')->middleware('auth');
Route::put('/management/Gestio-interna/propostes/declinar/{idProposta}', 'PropuestaController@declinar')->name('propostes.declinar')->middleware('auth');