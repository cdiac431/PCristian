<?php

use Illuminate\Support\Facades\Route;

//Indica la ruta que se veurà al link, ProjectesController::class busca al controlador la classe, passa parametres "projecte" i el identifica coma  "projecte"
Route::resource('/management/Gestio-empresa/projectes', ProyectoController::class)->parameters(['projectes' => 'projecte'])->names('projectes')->middleware('auth');
Route::get('/management/Gestio-empresa/projectes/{projecte}','ProyectoController@show')->name("projectes.show")->middleware('auth');
Route::get('/management/Gestio-empresa/projectes/{mes}/{projecte}','ProyectoController@index_month')->name("projectes.mes")->middleware('auth');
Route::post('/management/Gestio-empresa/projectes/{idChat}/{projecte}','ProyectoController@chatUp')->name("projectes.chat")->middleware('auth');
Route::post('/management/Gestio-empresa/projectes/{projecte}','ProyectoController@finalDestroy')->name("projectes.final")->middleware('auth');
Route::delete('/management/Gestio-empresa/projectes','ProyectoController@retornProposta')->name("projectes.retorn")->middleware('auth');



//Route::post('/management/Gestio-empresa/projectes', [ProjectesController::class, 'store'])->name('proyectos.store');
Route::resource('/management/Gestio-empresa/empleats', 'EmpleadoController')->parameters(['empleats' => 'empleat'])->names('empleats')->middleware('auth');

Route::group(['middleware' => ['GestioEmpresa:GestioEmpresa.view']], function () {
    //----- Empleados -----//
    //controller de empleats
    Route::get('/management/gestioempresa/empleats/{page}/{limit}/{offset}',
        'EmpleadoController@index')->name('empleats')->middleware('auth');
    Route::post('/management/gestioempresa/empleats/crear', 'EmpleadoController@store')
    ->name('empleats.store')->middleware('auth');

    //Eliminar
    Route::post('/management/gestioempresa/empleats/eliminacio', 'EmpleadoController@delete')
    ->name('empleats.deleteall')->middleware('auth');
    Route::get('/management/gestioempresa/empleats/eliminar/{id}',
        'EmpleadoController@singledelete')
    ->name('empleats.deleteone')->middleware('auth');
    //Editar
    Route::get('/management/gestioempresa/empleats/editar/{id}',
        'EmpleadoController@edituser')->name('empleats.editar')->middleware('auth');
    Route::patch('/management/gestioempresa/empleats/actualitzar/{id}',
        'EmpleadoController@actualitzar')->name('empleats.actualitzar')->middleware('auth');
    //show
    Route::get('/management/gestioempresa/empleats/{shown}',
        'EmpleadoController@show')->name('empleats.show')->middleware('auth');
    //resource
    Route::resource('/management/gestioempresa/empleats', 'EmpleadoController')->middleware('auth');
});

Route::group(['middleware' => ['Propostes:propostes.top']], function () {
    Route::resource('/management/Gestio-empresa/pressupostos', 'LiniaPresupuestoController')->parameters(['pressupostos' => 'pressupost'])->names('pressupostos')->middleware('auth');
});

Route::get('/projectes/{idProjecte}', 'ProyectoController@getDisplay')->name('projectes');
