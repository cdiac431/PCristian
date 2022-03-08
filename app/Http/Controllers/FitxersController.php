<?php

namespace App\Http\Controllers;

use App\Models\Fitxers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FitxersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public static function store($fitxers, $ruta, $multiple = false, $mimes = ['application/pdf','application/vnd.oasis.opendocument.text','application/vnd.google-apps.document','application/msword','application/vnd.oasis.opendocument.spreadsheet','application/vnd.google-apps.spreadsheet','application/vnd.ms-excel','text/plain','image/jpeg','image/png','video/mpeg','video/x-msvideo','audio/mpeg'], $tamany = 5, $humanReadableName = false)
     {
         // Default Mime Types
         /*[
             'application/pdf',
             'application/vnd.oasis.opendocument.text',
             'application/vnd.google-apps.document',
             'application/msword',
             'application/vnd.oasis.opendocument.spreadsheet',
             'application/vnd.google-apps.spreadsheet',
             'application/vnd.ms-excel',
             'text/plain',
             'image/jpeg',
             'image/png',
             'video/mpeg',
             'video/x-msvideo',
             'audio/mpeg'
         ]*/
            //exit(var_dump($fitxers));
            if ($fitxers) {


             foreach ($fitxers as $key => $file) {

                 $mime = $file->getClientMimeType();
                 if (!in_array($mime, $mimes)) {
                     //session('error', 'Extensió de fitxer invalida!');
                     return false;
                 }

                 if (!$multiple) {
                     break;
                 }
             }

             //['db'=>'hola', ['tamany'=>'field1', 'extencio'=>'field2'];

             $output = [];

             foreach ($fitxers as $key => $file) {
                 $nom = $file->getClientOriginalName();
                 $ext = $file->getClientOriginalExtension();
                 $tamany_bt = $file->getSize();
                 $tamany_mb = $tamany_bt / pow(1024, 2);

                 if ($tamany_mb > $tamany) {
                     return false;
                 }

                 if($humanReadableName) {
                     $ruta = $file->storeAs($ruta, basename($nom, $ext). '-'. time(). $ext);
                 } else {
                     $ruta = $file->store($ruta);
                 }

                 if(!$ruta) {
                    return false;
                 };

                 $fileinfo = ['nom_original' => basename($nom, $ext), 'nom_definitiu' => basename($ruta, $ext), 'extensio' => $ext, 'tamany_bytes' => $tamany_bt, 'tamany_megabytes' => $tamany_mb, 'ruta' => $ruta];

                 //El nom del fitxer guardat es distinct del nom emmagatzemat al array per raons de seguritat...
                 if (!$multiple) {
                     $output = $fileinfo;
                     break;
                 } else {
                     $output[] = $fileinfo;
                 }
             }

             return $output;//return redirect('pujar-arxiu')->with('success', 'Arxius penjats correctament');
         }

         return false; //return redirect('pujar-arxiu')->with('error', 'No s\'ha seleccionat cap fitxer!');

     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function show(Fitxers $archivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function edit(Fitxers $archivo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fitxers $archivo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Archivo $archivo)
    {
        //
    }
}
