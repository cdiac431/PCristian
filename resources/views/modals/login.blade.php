<div class="modal fade" id="login">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header border-bottom-1">
				<h4 class="form-title col-11 text-center"><img src="./img/logoproiectus.png" width="30" height="30" class="d-inline-block align-center" alt="">Login</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="d-flex flex-column text-center">
					<form method="POST" action="{{ route('login')}}">
						@csrf
						<div class="form-group inputBox my-4">
							<input type="text" class="form-control" required name="email">
							<span>Email</span>
							<i class="fas fa-user"></i>
						</div>
						<div class="form-group inputBox my-4">
							<input type="password" class="form-control" required name="password">
							<span>Contrasenya</span>
							<i class="fas fa-lock"></i>
						</div>
						<div class="form-group inputBox text-center">
							<button type="submit" class="btn btn-block btn-round btn-primary">Login</button>
						</div>
					</form>
				</div>
			</div>
			<div class="modal-footer justify-content-center">
				<a href="{{ route('forget-password')}}" class="text-center">Recuperar la contrasenya</a>
			</div>
		</div>
	</div>
</div>
