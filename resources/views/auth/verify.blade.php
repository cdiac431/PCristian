<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verifica el teu e-mail per canviar de contrasenya</div>
                  <div class="card-body">
                   @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                           {{ __('Hem enviat un e-mail de verificació.') }}
                       </div>
                   @endif
                   <a href="{{ url('/reset-password/'.$token) }}">Clica</a>
               </div>
           </div>
       </div>
   </div>
</div>