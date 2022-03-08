<div class="modal fade" id="reviewcentre">
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
                        
                        <input type="hidden" name="centre_id" id="centre_id" >
                        <div class="row form-group">
                            <div class="col-sm-5">
                                <label class="control-label" style="position:relative; top:7px;">Nom Centre Educatiu: </label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" if="Nom_centre" id="Nom_centre" name="Nom_centre" value="{{old('Nom_centre')}}" required placeholder="Ingresa un nom" readonly>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-5">
                                <label class="control-label" style="position:relative; top:7px;">Localitat:</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="Localitat_centre" name="Localitat_centre" value="{{old('Localitat_centre')}}" required placeholder="Ingresa una localitat" readonly>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-5">
                                <label class="control-label" style="position:relative; top:7px;">Adreça:</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="Direccio_centre" name="Direccio_centre" value="{{old('Direccio_centre')}}"  required placeholder="Ingresa una adreça" readonly>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-5">
                                <label class="control-label" style="position:relative; top:7px;">Telèfon:</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="Telefon_centre" name="Telefon_centre" value="{{old('Telefon_centre')}} " required placeholder="Ingresa un telèfon" readonly>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-5">
                                <label class="control-label" style="position:relative; top:7px;">CIF:</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="CIF_centre" name="CIF_centre" value="{{old('CIF_centre')}}" required placeholder="Ingresa un CIF" readonly>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-5">
                                <label class="control-label" style="position:relative; top:7px;">Email:</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="Email_centre" name="Email_centre" value="{{old('Email_centre')}}" required placeholder="Ingresa un email" readonly>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-5">
                                <label class="control-label" style="position:relative; top:7px;">Documentació:</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="Fitxer_centre" name="Fitxer_centre" value="{{old('Fitxer_centre')}}" required placeholder="Ingresa la documentació" readonly>
                                <a id="Fitxer" name="Fitxer" href="" download><i class="fas fa-download"></i></a>
                            </div>
                        </div>
                    </div>
                        
						<div class="text-center">
							<!-- <button type="submit" class="btn btn-block btn-round btn-primary">Sol·licita el Registre!</button> -->
                            <button onclick="reviewInstitut2();" class="btn btn-primary" data-toggle="modal" data-target="#acceptreview"><i class="fas fa-check fa-1px"> Acceptar</i></button>
                            
                            <button onclick="reviewInstitut3();" class="btn btn-default" data-toggle="modal" data-target="#denyreview"><i class="fas fa-times fa-1px"></i> Declinar</button>
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
			<!-- <div class="modal-body"> -->

            <form id = "reviewacceptar" method="POST" action="{{route('instituto.acceptreview')}}">
                <div class="modal-body">
                @csrf
                @method('post')
                <input type="hidden" name="id_centre" id="id_centre" value="{{old('centre_id')}}">
                <input type="hidden" name="centre_nom" id="centre_nom" value="{{old('centre_nom')}}">
                <input type="hidden" name="centre_email" id="centre_email" value="{{old('Email_centre')}}">

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
			<!-- <div class="modal-body"> -->

            <form id = "reviewdenegar" method="POST" action="{{route('instituto.denyreview')}}">
                <div class="modal-body">
                    @csrf
                    @method('post')
                    <input type="hidden" name="centr_id" id="centr_id" value="{{old('centre_id')}}">
                    <input type="hidden" name="centr_nom" id="centr_nom" value="{{old('centre_nom')}}">
                    <input type="hidden" name="centr_email" id="centr_email" value="{{old('Email_centre')}}">

                    </form>
                    <button type="submit" class="btn btn-primary btn btn-block btn-round btn-primary">Sí</button>
                    
                    <button type="submit" class="btn btn-default btn btn-block btn-round btn-default" data-dismiss="modal">No</button>

				<div class="d-flex flex-column text-center"></div>
			</div>
		</div>
	</div>
</div>
