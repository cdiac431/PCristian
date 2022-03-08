<?php

use Illuminate\Support\Facades\Route;


Route::resource('/management/mail', MensajeEnviadoController::class)->names('mail')->middleware('auth');

Route::post('/management/mail/eliminacions', 'MensajeEnviadoController@multipledelete')
        ->name('mail.deleteall')->middleware('auth');

Route::resource('/blog', PostController::class)->names('blogs');

Route::resource('/management/wiki/{idWiki}/', WikiController::class)->names('wiki')->middleware('auth');

Route::resource('/management/chat/{idChat?}/', ChatController::class)->names('chat')->middleware('auth');

Route::resource('/management/proiectuscloud/{idProjecte?}/{idDirectori?}/', ProiectusCloudController::class)->names('proiectuscloud')->middleware('auth');
