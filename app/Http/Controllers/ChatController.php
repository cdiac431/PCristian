<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Mensaje;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idChat = 0)
    {
        //echo $id;
        $chat = Mensaje::where('estat', 'actiu')->where('id_xat', $idChat)->get();
        $users = User::all();
        $user = auth()->user();
        //var_dump($chat);
        return view('Grup4.chat', compact('chat', 'users', 'user', 'idChat'));
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
    public function store(Request $request, $idChat)
    {
        if (strlen(trim($request->contingut)) > 0) {
            $chat = new Mensaje;

            $chat->id_usuari = auth()->user()->id;
            $chat->id_xat = $idChat;
            $chat->estat_missatge = 'Enviat';
            $chat->estat = 'actiu';
            $chat->contingut = trim($request->contingut);

            $chat->save();
        }


        return redirect('/management/chat/'. $idChat);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show(Chat $chat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        //
    }
}
