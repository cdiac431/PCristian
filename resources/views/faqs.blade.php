@extends('layouts.management')

@section('title', 'FAQs')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/Grup4/custom.css')}}">
@endsection

@section('content')


<div class="container">

    <h1 class="cover-heading text-center mt-5 titulFAQS">Preguntes i Respostes Freqüents</h1>

    <div class="row">
        <div class="col-md-4 py-5">
            <div id="accordion">
                <h3 class="text-center mb-3">Proiectus</h3>
                <div class="card">
                    <div class="card-header" id="headingLeft">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseLeft" aria-expanded="true" aria-controls="collapseLeft">
                            <p class="m-0">Que és Proiectus?</p>
                        </button>
                    </h5>
                    </div>

                    <div id="collapseLeft" class="collapse" aria-labelledby="headingLeft" data-parent="#accordion">
                    <div class="card-body">
                        <p>Proiectus és més que una aplicació web, és una plataforma col·laborativa.<br>Ho considerem així a causa del fet que tens tot el que necessites, un Blog on pots postear noves notícies o curiositats, un xat intern per a comunicar-te en els diferents membres del projecte, un sistema de missatgeria interna per a enviar emails si així ho desitges.</p>
                    </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingLeft2">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseLeft2" aria-expanded="true" aria-controls="collapseLeft2">
                            <p class="m-0">On i quan es va crear Proiectus?</p>
                        </button>
                    </h5>
                    </div>

                    <div id="collapseLeft2" class="collapse" aria-labelledby="headingLeft2" data-parent="#accordion">
                    <div class="card-body">
                        <p>Aquesta plataforma va ser creada entre l'any 2020-2021 a l'Institut Montsià, Amposta.</p>
                    </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingLeft3">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseLeft3" aria-expanded="true" aria-controls="collapseLeft3">
                            <p class="m-0">Qui són els creadors de Proiectus?</p>
                        </button>
                    </h5>
                    </div>

                    <div id="collapseLeft3" class="collapse" aria-labelledby="headingLeft3" data-parent="#accordion">
                    <div class="card-body">
                        <p>Els creadors de la plataforma van ser els membres del cicle formatiu del grau superior DAW2.</p>
                    </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingLeft4">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseLeft4" aria-expanded="true" aria-controls="collapseLeft4">
                            <p class="m-0">Les meves dades estan protegides amb Proiectus?</p>    
                        </button>
                    </h5>
                    </div>

                    <div id="collapseLeft4" class="collapse" aria-labelledby="headingLeft4" data-parent="#accordion">
                    <div class="card-body">
                        <p>Seee clar que si :)</p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 py-5">
            <div id="accordion">
                <h3 class="text-center mb-3">Propostes</h3>
                <div class="card">
                    <div class="card-header" id="headingCenter">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseCenter" aria-expanded="true" aria-controls="collapseCenter">
                            <p class="m-0">Que són les Propostes?</p>
                        </button>
                    </h5>
                    </div>

                    <div id="collapseCenter" class="collapse" aria-labelledby="headingCenter" data-parent="#accordion">
                    <div class="card-body">
                        <p>Quan els centres educatius o entitats tenen una idea de projecte aquesta es plasma en una proposta.</p>
                    </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingCenter2">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseCenter2" aria-expanded="true" aria-controls="collapseCenter2">
                            <p class="m-0">Com puc crear una Proposta?</p>
                        </button>
                    </h5>
                    </div>

                    <div id="collapseCenter2" class="collapse" aria-labelledby="headingCenter2" data-parent="#accordion">
                    <div class="card-body">
                        <p>Un cop estigues registrat a la plataforma, podràs crear una proposta des de la graella del teu perfil.</p>
                    </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingCenter3">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseCenter3" aria-expanded="true" aria-controls="collapseCenter3">
                            <p class="m-0">Com puc eliminar una Proposta?</p>
                        </button>
                    </h5>
                    </div>

                    <div id="collapseCenter3" class="collapse" aria-labelledby="headingCenter3" data-parent="#accordion">
                    <div class="card-body">
                        <p>Les úniques propostes que pots eliminar són les que has creat.<br>A l'apartat de les teves propostes fes clic a la icona de la paperera.</p>
                    </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingCenter4">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseCenter4" aria-expanded="true" aria-controls="collapseCenter4">
                            <p class="m-0">Com puc compartir una Proposta a les xarxes socials?</p>
                        </button>
                    </h5>
                    </div>

                    <div id="collapseCenter4" class="collapse" aria-labelledby="headingCenter4" data-parent="#accordion">
                    <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 py-5">
            <div id="accordion">
                <h3 class="text-center mb-3">Projectes</h3>
                <div class="card">
                    <div class="card-header" id="headingRight">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseRight" aria-expanded="true" aria-controls="collapseRight">
                            <p class="m-0">Que són els Projectes?</p>
                        </button>
                    </h5>
                    </div>

                    <div id="collapseRight" class="collapse" aria-labelledby="headingRight" data-parent="#accordion">
                    <div class="card-body">
                        <p>Un cop tant el centre educatiu com l'entitat accepten col·laborar a través de la proposta es converteix amb un projecte.</p>
                    </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingRight2">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseRight2" aria-expanded="true" aria-controls="collapseRight2">
                            <p class="m-0">Quan puc unir-me a un Projecte?</p>
                        </button>
                    </h5>
                    </div>

                    <div id="collapseRight2" class="collapse" aria-labelledby="headingRight2" data-parent="#accordion">
                    <div class="card-body">
                        <p>Quan un projecte estigui iniciat rebràs la invitació per part de l'encarregat de l'empresa o en cas que t'uneixis amb un institut serà per part del professor assignat.</p>
                    </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingRight3">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseRight3" aria-expanded="true" aria-controls="collapseRight3">
                            <p class="m-0">Puc unir-me a un Projecte ja iniciat?</p>  
                        </button>
                    </h5>
                    </div>

                    <div id="collapseRight3" class="collapse" aria-labelledby="headingRight3" data-parent="#accordion">
                    <div class="card-body">
                        <p>Sí, sempre que estigui registrat a la plataforma i hagi rebut la invitació per part dels responsables del projecte.</p>
                    </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingRight4">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseRight4" aria-expanded="true" aria-controls="collapseRight4">
                            <p class="m-0">Com puc contactar amb els participants d'un Projecte?</p>
                        </button>
                    </h5>
                    </div>

                    <div id="collapseRight4" class="collapse" aria-labelledby="headingRight4" data-parent="#accordion">
                    <div class="card-body">
                        <p>Pots fer ús del sistema de missatgeria interna de la plataforma.</p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection