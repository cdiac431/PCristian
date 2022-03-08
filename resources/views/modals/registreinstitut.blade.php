<!-- Registrar Persona institut -->
<div class="modal fade" id="registreinstitut">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header border-bottom-1">
				<h4 class="form-title col-11 text-center"><img src="./img/logoproiectus.png" width="30" height="30" class="d-inline-block align-center" alt="">Registre d'Institut</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="d-flex flex-column text-center">
					<form method="POST" action="{{route('registroinstitutos.store')}}">
						@csrf
						<div class="form-group inputBox my-4">
							<input type="text" class="form-control" required name="email">
							<span>El teu Email</span>
                            <i class="fas fa-envelope"></i>
                        	</div>
                        <div class="form-group inputBox my-4">
							<input type="text" class="form-control" required name="centre">
							<span>Nom Centre</span>
                            <i class="fas fa-school"></i>
                    	</div>
                        <div class="form-group inputBox my-4">
							<input type="number" class="form-control" required name="telefon">
							<span>El teu telèfon</span>
                            <i class="fas fa-phone"></i>
                        </div>
						<div class="form-group inputBox my-4">
							<input type="text" class="form-control" required name="nom">
							<span>El Teu Nom</span>
                            <i class="fas fa-address-card"></i>
						</div>
						<div class="form-group inputBox my-4">
							<input type="text" class="form-control" required name="cognom">
							<span>El teu Cognom</span>
                            <i class="fas fa-address-card"></i>
						</div>
                        <div class="form-group inputBox my-4">
							<input type="text" class="form-control" required name="segon_cognom">
							<span>El teu Segon Cognom</span>
                            <i class="fas fa-address-card"></i>
						</div>
                        <div class="form-group inputBox my-4">
							<input type="text" class="form-control" required name="dni">
							<span>DNI</span>
                            <i class="fas fa-address-card"></i>
						</div>
                        <div class="form-group inputBox my-4">
							<input type="text" class="form-control" required name="user_name">
							<span>Nom d'Usuari</span>
                            <i class="fas fa-user"></i>
						</div>
                        <div class="form-group inputBox my-4">
							<input type="password" class="form-control" required name="password">
							<span>Contrasenya</span>
                            <i class="fas fa-lock"></i>
						</div>
                        <p>Sou un...</p>
                        <div class="form-group inputBox my-4">
							<input type="text" class="form-control" required name="tipus" value="Institut" readonly>
                            <i class="fas fa-school"></i>
						</div>
						
                        <!--Indiquem que l'user és registrarà en inactiu para que l'admin el doni d'alta-->
                       
						<div class="form-group inputBox text-center">
							<button type="submit" class="btn btn-block btn-round btn-primary">Sol·licita el Registre!</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Registrar institut -->
@if(session('institut'))
<div class="modal fade" id="registreinstitutfinal">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header border-bottom-1">
				<h4 class="form-title col-11 text-center"><img src="./img/logoproiectus.png" width="30" height="30" class="d-inline-block align-center" alt="">Dades del Institut o Centre</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="d-flex flex-column text-center">
					<form method="POST" action="{{route('registreinstituts.update', session('institut')->id)}}" enctype="multipart/form-data">
						@csrf
                        @method('put')
						<p>Centre/Institut:</p>
						<div class="form-group inputBox my-4">
							<input type="text" class="form-control" value="{{session('institut')->nom}}" required name="nom" readonly >
                            <i class="fas fa-school"></i>
                        	</div>
                        <div class="form-group inputBox my-4">
							<input type="text" class="form-control" required name="localitat">
							<span>Localitat:</span>
							<i class="fas fa-map-marked-alt"></i>
						</div>
						<div class="form-group inputBox my-4">
							<input type="text" class="form-control" required name="direccio">
							<span>Direcció:</span>
							<i class="fas fa-map-marker-alt"></i>
						</div>
                        <div class="form-group inputBox my-4">
							<input type="number" class="form-control" required name="telefon">
							<span>Telèfon:</span>
                            <i class="fas fa-phone"></i>
                        </div>
						<div class="form-group inputBox my-4">
							<input type="text" class="form-control" required name="cif">
							<span>CIF:</span>
                            <i class="fas fa-address-card"></i>
						</div>
						<div class="form-group inputBox my-4">
							<input type="text" class="form-control" required name="email">
							<span>Email:</span>
                            <i class="fas fa-envelope"></i>
						</div>
						<br>

						<div class="form-group inputBox my-4">
							<span>Documentació per acreditar el centre (comprimir amb el format .pdf, .ZIP o .TAR)</span>
						</div>	
						
						<div class="form-group inputBox my-4">
							<input style="padding-left: 8%;" type="file" name="docum_centre" id="file" accept=".tar, .zip, application/pdf" size="10000" required>
                            <i class="fas fa-file"></i>
							@error('files')
								<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
							@enderror
						</div>

						
                        
						<div class="form-group inputBox text-center">
							<button type="submit" class="btn btn-block btn-round btn-primary">Sol·licita el Registre!</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endif
