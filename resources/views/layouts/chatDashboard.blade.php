<style>
    #content {
        margin: 0;
        padding: 0;
        width: 10%;
    }
</style>

<div id="chat-container" clchat-containerass="container-fluid">
    <div class="row chat2">
        <div class="ps-container ps-theme-default ps-active-y" id="chat-content">



            <!-- CREAR ARRAY PER MOSTRAR MISSATGES CORRESCTAMENT, EMMAGATZEMAR TOTS ELS MSG A L'ARRAY SEGONS EL FILTRE I DESPRES IMPRIMIRLOS AMB UN ARRAY PER LISTAR ELS ARRAYS I UN SUBARRAY PER LLISTAR MISSATGES <P> -->



            @php

                // Vars
                $id_usuari = 0;
                $data = 0;

                $messages = [];

                foreach ($chat as $message) {

                    if ($message->id_usuari !== $id_usuari) {

                        if (date('d-m-Y', strtotime($message->data)) > $data) {
                            $messages[] = [
                                'type' => 'divider',
                                'date' => (date('d-m-Y', strtotime($message->data)) === date('d-m-Y') ? 'Avui' : date('d-m-Y', strtotime($message->data)))
                            ];

                            $id_usuari = 0;
                        } else {
                            $id_usuari = $message->id_usuari;
                        }

                        $messages[] = [
                            'type' => 'message',
                            'user' => ['id' => $message->id_usuari, 'name' => $users->find($message->id_usuari)->nom. ' '. $users->find($message->id_usuari)->cognom],
                            'time' => date('G:i', strtotime($message->data)),
                            'message' => [$message->contingut]
                        ];

                        $data = date('d-m-Y', strtotime($message->data));
                    } elseif ($message->id_usuari === $id_usuari) {
                        $messages[count($messages)-1]['message'][] = $message->contingut;
                        $messages[count($messages)-1]['time'] = date('G:i', strtotime($message->data));
                    }
                }

                //echo "<pre>". print_r($messages,true)."</pre>";
            @endphp

            @foreach ($messages as $message)


                {{-- @if ($currdate > $prevdate)

                @endif --}}

                @if ($message['type'] === 'message')
                    <div class="media media-chat @if ($message['user']['id'] === $user->id) media-chat-reverse @endif">
                        <img class="avatar" @foreach ($users as $userAva)@if ($message['user']['id'] === $userAva->id)src="{{asset('avatars/' . $userAva->ruta_avatar)}}"@endif @endforeach alt="...">
                        <div class="media-body">
                            <p class="meta"><time>{{ $message['user']['name'] }}</time></p>


                            @foreach ($message['message'] as $content)
                                <p class="text-dark">{{ $content }}</p>
                            @endforeach
                            <p class="meta"><time>{{ $message['time'] }}</time></p>
                        </div>
                    </div>
                @else
                    <div class="media media-meta-day">{{ $message['date'] }}</div>
                @endif

            @endforeach



            <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
                <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps-scrollbar-y-rail" style="top: 0px; height: 0px; right: 2px;">
                <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 2px;"></div>
            </div>
        </div>
        @isset($projecte)
            <form class="publisher bt-1 border-light" action="{{ route('projectes.chat',[ $idChat, $projecte]) }}" method="POST">
        @else
            <form class="publisher bt-1 border-light" action="{{ route('tauler.chat', $idChat) }}" method="POST">
        @endif
            @csrf
            <img class="avatar avatar-xs" src="{{asset('avatars/' . auth()->user()->ruta_avatar)}}" alt="...">
            <input class="publisher-input" autocomplete="off" type="text" placeholder="Write something" name="contingut">
            <button class="publisher-btn" type="submit" data-abc="true">
                <i class="fa fa-paper-plane"></i>
            </button>
        </form>
    </div>
</div>

<script>
    var chatD = document.getElementById('chat-content');
    function scrolldown() {
        window.chatD.scroll(0,chatD.scrollHeight);
    }

    scrolldown();
    
    function update() {

        $.ajax({
            url:'{{ route('chat.index', $idChat) }}',
            type:'GET',
            success: function(data){
                var scroll = $('#chat-content').scrollTop();
               $('#chat-content').replaceWith($(data).find('#chat-content'));
               $('#chat-content').scrollTop(scroll);
            }
        });
        setTimeout(function() { update(); }, 3000);

    }
    update();


</script>