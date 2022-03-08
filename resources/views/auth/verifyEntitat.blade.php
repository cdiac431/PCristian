<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Espitja el següent enllaç per continuar amb el registre de la teva empresa i validar el teu usuari!</div>
                  <div class="card-body">
                   @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                           {{ __('Hem enviat un e-mail de verificació.') }}
                       </div>
                   @endif
                   <a href="{{ url('/registreempresas/confirmation/'. $token) }}">Clica</a>
               </div>
           </div>
       </div>
   </div>
</div>