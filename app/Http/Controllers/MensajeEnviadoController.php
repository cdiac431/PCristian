<?php

namespace App\Http\Controllers;

use App\Models\MensajeEnviado;
use App\Models\MensajeRecibido;
use Illuminate\Http\Request;

class MensajeEnviadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userMail = auth()->user()->email;
        $mailUser = MensajeRecibido::where('estat', 'actiu')->where('destinatari',"$userMail")->orderBy('id','desc')->paginate(5);
        foreach($mailUser as $m) {
            MensajeRecibido::where('id', $m->id)->update(['vist' => 'si']);
        }
        $mail = MensajeRecibido::where('estat', 'actiu')->where('destinatari',"$userMail")->orderBy('id','desc')->paginate(5);
        return view('Grup4.mail', compact('mail'));
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
    public function store(Request $request)
    {
      // $this->validate(
      // $request,[
      //   'remitent' => 'required',
      //   'assumpte' => 'required',
      //   'missatge' => 'required'
      // ]);
      $mail = new MensajeEnviado();
      $rebut = new MensajeRecibido();
      $rebut->remitent = auth()->user()->email;
      $rebut->destinatari = $request->destinatari;
      $rebut->assumpte = $request->asu;
      $rebut->cos = $request->cos;
      $rebut->estat = 'actiu';
      $mail->remitent = auth()->user()->email;
      $mail->assumpte = $request->asu;
      $mail->cos = $request->cos;
      $mail->estat = 'actiu';
      $mail->save();
      $rebut->save();
      return redirect('/management/mail')->with('success', 'Missatge enviat correctament');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MensajeEnviado  $mensajeEnviado
     * @return \Illuminate\Http\Response
     */
    public function show(MensajeEnviado $mensajeEnviado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MensajeEnviado  $mensajeEnviado
     * @return \Illuminate\Http\Response
     */
    public function edit(MensajeEnviado $mensajeEnviado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MensajeEnviado  $mensajeEnviado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MensajeEnviado $mensajeEnviado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MensajeEnviado  $mensajeEnviado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $mail = MensajeRecibido::find($request->emailEl);
      $mail->estat = 'inactiu';
      $mail->save();
      return redirect('/management/mail')->with('success', 'Missatge eliminat correctament');
    }
}
