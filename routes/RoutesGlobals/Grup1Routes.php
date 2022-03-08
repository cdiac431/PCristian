<?php


use Illuminate\Support\Facades\Route;


Route::resource('/management/Gestio-central/incidencies', IncidenciaController::class)->parameters(['incidencies' => 'incidencia'])->names('incidencies')->middleware('auth');
Route::post('/management/Gestio-central/incidencies/eliminacio', 'IncidenciaController@multipledelete')
        ->name('incidencies.deleteall')->middleware('auth');
Route::post('/management/Gestio-central/incidencies/exportacio', 'IncidenciaController@exportCsv')
    ->name('incidencies.exportCsv')->middleware('auth');
Route::get('/management/Gestio-central/usuaris/cercar','UsuarioController@cercar')
    ->name('usuaris.cercar');
Route::group(['middleware' => ['role:Administrador']], function () {
    Route::resource('/management/Gestio-central/usuaris', UsuarioController::class)->parameters(['usuaris' => 'usuari'])->names('usuaris')->middleware('auth');
    Route::resource('/management/Gestio-central/instituts', InstitutoController::class)->parameters(['instituts' => 'institut'])->names('instituts')->middleware('auth');
    Route::resource('/management/Gestio-central/empreses', EmpresaController::class)->parameters(['empreses' => 'empresa'])->names('empreses')->middleware('auth');
    Route::get('/management/Gestio-central/empresesPendents', "EmpresaController@pendents")->name('empreses.pendents')->middleware('auth');
    Route::get('/management/Gestio-central/institutsPendents', "InstitutoController@pendents")->name('instituto.pendents')->middleware('auth');
    Route::post('/management/Gestio-central/institutsPendents/confirmation', 'RegistroInstitutoController@acceptreview')->name('instituto.acceptreview')->middleware('auth');
    Route::post('/management/Gestio-central/institutsPendents/denypetition', 'RegistroInstitutoController@denyreview')->name('instituto.denyreview')->middleware('auth');

    Route::post('/management/Gestio-central/empresesPendents/confirmation', 'RegistroEmpresaController@acceptreview')->name('empresa.acceptreview')->middleware('auth');
    Route::post('/management/Gestio-central/empresesPendents/denypetition', 'RegistroEmpresaController@denyreview')->name('empresa.denyreview')->middleware('auth');

    Route::post('/management/Gestio-central/usuaris/eliminacio', 'UsuarioController@multipledelete')
        ->name('usuaris.deleteall')->middleware('auth');
    Route::post('/management/Gestio-central/empreses/eliminacio', 'EmpresaController@multipledelete')
        ->name('empreses.deleteall')->middleware('auth');
    Route::post('/management/Gestio-central/instituts/eliminacio', 'InstitutoController@multipledelete')
        ->name('instituts.deleteall')->middleware('auth');
    Route::post('/management/Gestio-central/instituts/exportacio', 'InstitutoController@exportCsv')
    ->name('instituts.exportCsv')->middleware('auth');
    Route::post('/management/Gestio-Central/instituts/importar', 'InstitutoController@importCsv')
        ->name('instituts.importCsv')->middleware('auth');
    Route::post('/management/Gestio-central/empreses/exportacio', 'EmpresaController@exportCsv')
        ->name('empreses.exportCsv')->middleware('auth');
    Route::post('/management/Gestio-central/empreses/importar', 'EmpresaController@importCsv')
        ->name('empreses.importCsv')->middleware('auth');
    Route::post('/management/Gestio-central/usuaris/exportacio', 'UsuarioController@exportCsv')
        ->name('usuaris.exportCsv')->middleware('auth');
    Route::post('/management/Gestio-Central/usuaris/importar', 'UsuarioController@importCsv')
    ->name('usuaris.importCsv')->middleware('auth');
    Route::get('/management/Gestio-central/empreses/{id}', 'EmpresaController@veure')
    ->name('empreses.veure')->middleware('auth');
});

Route::group(['middleware' => ['permissionCategoria:categoria.view']], function () {
    Route::resource('/management/Gestio-central/categories', CategoriaController::class)->parameters(['categories' => 'categoria'])->names('categories')->middleware('auth');
    Route::post('/management/Gestio-central/categories/eliminacio', 'CategoriaController@multipledelete')
        ->name('categories.deleteall');


});



