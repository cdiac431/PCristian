@extends('layouts.management')

@section('title', 'Contacte')

@section('content')
{!! htmlScriptTagJsApi() !!}
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                    <form class="py-5" method="POST" action="{{route('contacte.enviar')}}">
                        @csrf
                        <fieldset>
                            <h2 class="text-center p-0 mb-4">Contacta amb nosaltres</h2>
                            <div class="form-group">
                                <i class="fa fa-user bigicon iconLeft"></i>
                                <input class="form-control ml-4" name="nom" type="text" required placeholder="Nom" >
                            </div>
                            <div class="form-group">
                                <i class="fa fa-user bigicon iconLeft"></i>
                                <input class="form-control ml-4" name="cognom" type="text" required placeholder="Cognom">
                            </div>

                            <div class="form-group">
                                <i class="fa fa-envelope-o bigicon iconLeft"></i>
                                <input class="form-control ml-4" name="correu" type="text" required placeholder="Email">
                            </div>

                            <div class="form-group">
                                <i class="fa fa-pencil-square-o bigicon iconLeft"></i>
                                <textarea class="form-control ml-4" name="missatge" required placeholder="Escriu el teu missatge." rows="7"></textarea>
                            </div>

                            <div class="proteccio-dades  ml-4" style=" border: 1px solid #ced4da; padding: 15px; width: 100%; border-radius: .25rem; font-size:12px; line-height:15px; font-family: inherit;">
                                INFORMACIÓ BÀSICA SOBRE PROTECCIÓ DE DADES
                                <br>
                                <br>
                                <strong>Responsable</strong>: Institut Montsià
                                <br>
                                <strong>Dades de contacte per exercir els seus drets</strong>: 
                                Adreça:  C/ Madrid, 35 - 49, Amposta, 43870 , Tarragona (Espanya). 
                                Email: <a href="mailto:admin@empatica.net">info@proiectus.cat</a>
                                <br>
                                <strong>Finalitat</strong>
                                : Atendre les seves consultes. En cas d'acceptar-ho, enviament de comunicacions comercials i newsletters informatius.
                                <br>
                                <strong>Legitimació</strong>:
                                <br>
                                - Demanda de serveis.
                                <br>
                                - Consentiment de l'interessat.
                                <br>
                                <strong>Destinataris</strong>: Persones o entitats directament relacionades amb el responsable i instàncies amb obligació legal. 
                                No es comunicaran les dades a tercers, excepte obligació legal.
                                <br>
                                <strong>Drets</strong>
                                : Té dret a accedir, rectificar i suprimir les dades, així com altres drets, indicats en la informació addicional, 
                                que pot exercir dirigint-se a l'adreça del responsable del tractament.
                                <br>
                                <strong>Procedència</strong>
                                : El propi interessat.
                                <br>
                                <strong>Informació addicional</strong>
                                : Pot consultar informació addicional i detallada en el següent enllaç 
                                <a href="{{asset('/textosLegals/politicaPrivacitat')}}">Política de privacitat i protecció de dades.</a>
                            </div>
                            
                            <div class="ml-4"  style=" float: left; margin: 1.429em 0 0;">
                                <input style="float: left; margin: 0 .4em 0 0;" required="required" type="checkbox">
                                <label style=" float: left; font-size: 0.929em; line-height: 1em; padding-bottom:20px;">Dono el meu consentiment per al tractament de les meves dades personals.</label>
                            </div>
                            

                            <div class="form-group">
                                <div class="ml-4 text-left">
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                                @if (Session::get('message_sent'))
                                <div class="alert alert-success mt-2 ml-4" role="alert">
                                    {{Session::get('message_sent')}}
                                </div>
                            
                             @endif
                            </div>
                        </fieldset>
                    </form>
                   
            </div>
            <div class="col-md-5 offset-md-1 justify-content-center py-5">

                <iframe class="" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3024.3953745832223!2d0.5803123150262587!3d40.70931197933221!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a0fe735557799b%3A0x3fade49ba3687306!2sInstitut%20Montsi%C3%A0%20i%20CFA%20Sebasti%C3%A0%20Juan%20Arb%C3%B3!5e0!3m2!1sca!2ses!4v1612986239149!5m2!1sca!2ses" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

            </div>
        </div>
    </div>

@endsection
