
<div class="modal fade" id="mdel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Confirmar eliminació:</h3>
        </div>
        <div class="modal-body">
          <p>Estas segur que vols eliminar els usuaris seleccionats?</p>
        </div>
        <div class="modal-footer">
            <form id="mformulari_eliminar_user" method="POST" action="{{route('usuaris.deleteall')}}">
            @csrf
                <div class="d-none" id="inputs"></div>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button id="submitEliminar" type="submit" class="btn btn-primary">Eliminar</button>
              </form>
        </div>
      </div>
    </div>
  </div>
