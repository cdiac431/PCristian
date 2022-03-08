<div class="container mt-5">
	@if(session('success'))
	<div class="alert alert-success">
		{{ session('success') }}
	</div>
	@elseif(session('error'))
	<div class="alert alert-danger">
		{{ session('error') }}
	</div>
	@endif
	<div class="d-flex justify-content-center align-items-center position-relative m-auto" style="max-width: 600px; height: 300px !important;" id="drag-n-drop">
		<input @if($required ?? false) required @endif type="file" name="{{$name ?? 'fitxers'}}[]" class="position-absolute" id="drag-n-drop-file" accept="{{ implode(',', $mimetypes ?? ['application/pdf','application/vnd.oasis.opendocument.text','application/vnd.google-apps.document','application/msword','application/vnd.oasis.opendocument.spreadsheet','application/vnd.google-apps.spreadsheet','application/vnd.ms-excel','text/plain','image/jpeg','image/png','video/mpeg','video/x-msvideo','audio/mpeg']) }}" @if($multiple ?? false) multiple @endif>
		<div class="text-center">
			<h1 id="drag-n-drop-icon"><i class="fas fa-cloud-upload-alt"></i></h1>
			<h4 id="drag-n-drop-title"><strong>Escull un fitxer</strong> o arrastra'l aqui!</h4>
		</div>
	</div>
</div>
