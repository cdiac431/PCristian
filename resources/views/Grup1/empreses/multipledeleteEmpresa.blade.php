
<div class="modal fade" id="mdel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Confirmar eliminació:</h3>
        </div>
        <div class="modal-body">
          <p>Estas segur que vols eliminar les entitats seleccionades?</p>
        </div>
        <div class="modal-footer">
            <form method="POST" id="mformularieliminar" action="{{route('empreses.destroy', $id ?? "idaeleiminar")}}">
                @csrf
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button id="submitEliminar" type="submit" class="btn btn-primary">Eliminar</button>
              </form>
        </div>
      </div>
    </div>
  </div>

