<?php

//use App\Http\Controllers\RegistroInstitutoController;

//use App\Http\Controllers\RegistroEmpresaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

use App\Models\Empresa;
use App\Models\Instituto;
use App\Models\Propuesta;
use App\Models\Proyecto;

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\BlogpublicController;
use App\Http\Controllers\PostController;

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


Route::get('/', 'WelcomeController@index')->name('home');
Route::get("/xml", function() {
    ob_start();
    require(path("public")."BingSiteAuth.xml");
    return ob_get_clean();
});
Route::get('/blogpublic', [PostController::class, 'indexP'])->name('blogpublic');
Route::get('/blogpublic/{id}', [PostController::class, 'show'])->name('blogpublicpost');
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/faqs', function () {
    return view('faqs');
})->name('faqs');

Route::get('/textosLegals/notaLegal', function () {
    return view('/textosLegals/notaLegal');
})->name('notaLegal');

Route::get('/textosLegals/politicaPrivacitat', function () {
    return view('/textosLegals/politicaPrivacitat');
})->name('politicaPrivacitat');

Route::get('/textosLegals/cookies', function () {
    return view('/textosLegals/cookies');
})->name('cookies');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contacte', [ContactController::class, 'contact'])->name('contacte');
Route::post('/sent-message', [ContactController::class, 'sendEmail'])->name('contacte.enviar');
Route::get('/contacteProposta', [ContactController::class, 'contactProposta'])->name('contacteResponsableProposta');
Route::post('/sent-message-proposta', [ContactController::class, 'sendEmailProposta'])->name('contacte.enviarProposta');

Route::get('/tauler', 'DashboardController@index')->name("tauler")->middleware('auth');
Route::put('/tauler/{id}', 'DashboardController@updateIncidencia')->name("tauler.updateIncidencia")->middleware('auth');
Route::get('/tauler/{mes}','DashboardController@index_month')->name("tauler.mes")->middleware('auth');
Route::post('/tauler/{idChat}','DashboardController@chatUp')->name("tauler.chat")->middleware('auth');


//Route::post('/Http/Controllers/','RegistroInstitutoController@store')->name('registroinstitutos');
Route::resource('/registreinstituts', RegistroInstitutoController::class)->names('registroinstitutos');
Route::resource('/registreempreses', RegistroEmpresaController::class)->names('registroempresas');

Route::get('/registreinstituts/confirmation/{token}', 'RegistroInstitutoController@show')->middleware('tokenRegistreInstitut');
Route::put('/registreinstituts/{id}', 'RegistroInstitutoController@update')->name('registreinstituts.update');

Route::get('/registreempresas/confirmation/{token}', 'RegistroEmpresaController@show')->middleware('tokenRegistreEmpresa');
Route::put('/registreempresas/{id}', 'RegistroEmpresaController@update')->name('registreempresas.update');

//Route::post('/Http','RegistroEmpresaController@store')->name('registroempresas');

Route::put('/perfil_usuari/{id}', 'UsuarioController@updateuser')->name('perfil.edit')->middleware('auth');
Route::get('/perfil_usuari', 'UsuarioController@indexuser')->name('perfil.user')->middleware('auth');
Route::post('/perfil_usuari/{id}/edit', 'UsuarioController@updateavatar')->name('perfil.avatar')->middleware('auth');

Auth::routes();
Route::get('forget-password', 'Auth\ForgotPasswordController@getEmail')->name('forget-password');
Route::post('forget-password', 'Auth\ForgotPasswordController@postEmail')->name('forget-password');


Route::get('reset-password/{token}', 'Auth\ResetPasswordController@getPassword')->middleware('token');
Route::post('reset-password', 'Auth\ResetPasswordController@updatePassword');


Route::get('/management', function () {
    return view('management');
})->name('management')->middleware('auth');

Route::post('/', 'Auth\LoginController@login')->name('login');
Route::post('/', 'Auth\LoginController@loginRedirectProposta')->name('loginRedirectProposta');

Route::get('logout', 'Auth\LoginController@logout')->name('logout');
