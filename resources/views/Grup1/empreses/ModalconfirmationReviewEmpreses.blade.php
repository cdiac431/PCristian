<div class="modal fade" id="empresespendents">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header border-bottom-1">
				<!-- <h4 class="form-title col-11 text-center"><img src="./img/logoproiectus.png" width="30" height="30" class="d-inline-block align-center" alt="">Dades del Institut o Centre</h4> -->
                <img src="/img/logoproiectus.png" width="30" height="30" class="d-inline-block align-center" alt=""><h4 class="modal-title3" id="myModalLabel"></h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="d-flex flex-column text-left">
					<!-- <form method="POST" action=""> -->
						@csrf
                        @method('put')
                        
                        <input type="hidden" name="entitat_id" id="entitat_id" >
                        <div class="row form-group">
                            <div class="col-sm-5">
                                <label class="control-label" style="position:relative; top:7px;">Nom de l'Entitat: </label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" if="Nom_entitat" id="Nom_entitat" name="Nom_entitat" value="{{old('Nom_entitat')}}" required placeholder="Ingresa un nom" readonly>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-5">
                                <label class="control-label" style="position:relative; top:7px;">Localitat:</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="Localitat_entitat" name="Localitat_entitat" value="{{old('Localitat_entitat')}}" required placeholder="Ingresa una localitat" readonly>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-5">
                                <label class="control-label" style="position:relative; top:7px;">Adreça:</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="Direccio_entitat" name="Direccio_entitat" value="{{old('Direccio_entitat')}}"  required placeholder="Ingresa una adreça" readonly>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-5">
                                <label class="control-label" style="position:relative; top:7px;">Telèfon:</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="Telefon_entitat" name="Telefon_entitat" value="{{old('Telefon_entitat')}} " required placeholder="Ingresa un telèfon" readonly>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-5">
                                <label class="control-label" style="position:relative; top:7px;">CIF:</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="CIF_entitat" name="CIF_entitat" value="{{old('CIF_entitat')}}" required placeholder="Ingresa un CIF" readonly>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-5">
                                <label class="control-label" style="position:relative; top:7px;">Email:</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="Email_entitat" name="Email_entitat" value="{{old('Email_entitat')}}" required placeholder="Ingresa un email" readonly>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-5">
                                <label class="control-label" style="position:relative; top:7px;">Documentació:</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="Fitxer_entitat" name="Fitxer_entitat" value="{{old('Fitxer_entitat')}}" required placeholder="Ingresa la documentació" readonly>
                                <a id="Fitxer" name="Fitxer" href="" download><i class="fas fa-download"></i></a>
                            </div>
                        </div>
                    </div>
                        
						<div class="text-center">
							<!-- <button type="submit" class="btn btn-block btn-round btn-primary">Sol·licita el Registre!</button> -->
                            <button onclick="empresesPendents2();" class="btn btn-primary" data-toggle="modal" data-target="#acceptreview"><i class="fas fa-check fa-1px"> Acceptar</i></button>
                            
                            <button onclick="empresesPendents3();" class="btn btn-default" data-toggle="modal" data-target="#denyreview"><i class="fas fa-times fa-1px"></i> Declinar</button>
						</div>
					<!-- </form> -->
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Acceptar Registre -->
<div class="modal fade" id="acceptreview">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header border-bottom-1">
				<h4 class="form-title col-11 text-center"><img src="/img/logoproiectus.png" width="30" height="30" class="d-inline-block align-center" alt="">Estàs segur?</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			{{-- <div class="modal-body"> --}}
                <!-- <div class="modal-body"> -->

            <form id = "reviewacceptar" method="POST" action="{{route('empresa.acceptreview')}}">
                <div class="modal-body">
                @csrf
                @method('post')
                <input type="hidden" name="id_entitat" id="id_entitat" value="{{old('entitat_id')}}">
                <input type="hidden" name="entitat_nom" id="entitat_nom" value="{{old('entitat_nom')}}">
                <input type="hidden" name="entitat_email" id="entitat_email" value="{{old('Email_entitat')}}">

            </form>
            <button type="submit" class="btn btn-primary btn btn-block btn-round btn-primary">Sí</button>
            <button type="submit" class="btn btn-default btn btn-block btn-round btn-default" data-dismiss="modal">No</button>

                <div class="d-flex flex-column text-center"></div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Declinar Registre -->
<div class="modal fade" id="denyreview">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header border-bottom-1">
				<h4 class="form-title col-11 text-center"><img src="/img/logoproiectus.png" width="30" height="30" class="d-inline-block align-center" alt="">Estàs segur?</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			{{-- <div class="modal-body"> --}}
                
                <form id = "reviewdenegar" method="POST" action="{{route('empresa.denyreview')}}">
                  <div class="modal-body"> 
                        @csrf
                        @method('post')
                        <input type="hidden" name="enti_id" id="enti_id" value="{{old('entitat_id')}}">
                        <input type="hidden" name="enti_nom" id="enti_nom" value="{{old('entitat_nom')}}">
                        <input type="hidden" name="enti_email" id="enti_email" value="{{old('Email_entitat')}}">

                        </form>
                        <button type="submit" class="btn btn-primary btn btn-block btn-round btn-primary">Sí</button>
                    
                        <button type="submit" class="btn btn-default btn btn-block btn-round btn-default" data-dismiss="modal">No</button>

				    <div class="d-flex flex-column text-center"></div>
			</div>
		</div>
	</div>
</div>

