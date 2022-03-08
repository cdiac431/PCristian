<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use App\Models\Propuesta;
use App\Models\User;
use App\Models\MensajeEnviado;
use App\Models\MensajeRecibido;
use Mail;

class ContactController extends Controller
{
    public function contact()
    {
        return view('contacte');
    }
    public function contactProposta(Request $request)
    {
        $proposta = Propuesta::find($request->idProposta);
        $user = User::find($proposta->id_responsable);
        return view('contacteProposta',compact('proposta','user'));
    }

    public function sendEmail(Request $request)
    {
        $details=[
            'nom' => $request->nom,
            'cognom' => $request->cognom,
            'correu' => $request->correu,
            'missatge' => $request->missatge
        ];

        Mail::to('contacte@uniproject.cat')->send(new ContactMail($details));

        return back()->with('message_sent','El teu missatge s\'ha enviat correctament');
    }
    public function sendEmailProposta(Request $request)
    {
        $details=[
            'nom' => $request->nom,
            'cognom' => $request->cognom,
            'correu' => $request->correu,
            'missatge' => $request->missatge
        ];
        // return $request;
        $proposta = Propuesta::all()->find($request->idProposta);
        // return $proposta;
        $user = User::all()->find($proposta->id_responsable);

        $mail = new MensajeEnviado();
        $rebut = new MensajeRecibido();
        $rebut->remitent = $request->correu;
        $rebut->destinatari = $user->email;
        $rebut->assumpte = "Interessat en la proposta ".$proposta->nom;
        $rebut->cos = $request->missatge;
        $rebut->estat = 'actiu';
        $mail->remitent = $request->correu;
        $mail->assumpte = "Interessat en la proposta ".$proposta->nom;
        $mail->cos = $request->missatge;
        $mail->estat = 'actiu';
        $mail->save();
        $rebut->save();

        Mail::to($user->email)->send(new ContactMail($details));

        return back()->with('message_sent','S\'ha contactat amb el/s propietaris de la proposta');
    }
}
