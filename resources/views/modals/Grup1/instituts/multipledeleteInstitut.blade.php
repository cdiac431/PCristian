
<div class="modal fade" id="mdel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Confirmar eliminació:</h3>
        </div>
        <div class="modal-body">
          <p>Estas segur que vols eliminar els centres educatius seleccionats?</p>
        </div>
        <div class="modal-footer">
            <form id="mformularieliminar" method="POST" action="{{route('instituts.destroy', $id ?? "idaeliminar")}}">
                @csrf
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button id="submitEliminar" type="submit" class="btn btn-primary">Eliminar</button>
              </form>
        </div>
      </div>
    </div>
  </div>

