
<div class="modal fade" id="delUsuari" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Confirmar eliminació:</h3>
        </div>
        <div class="modal-body">
          <p>Estas segur que vols eliminar l'usuari?</p>
        </div>
        <div class="modal-footer">
            <form id="formulari_eliminar_user" method="POST" action="{{route('usuaris.destroy', $id ?? "iddestroy")}}">
            @csrf
                @method('DELETE')
                <input type="hidden" name="usuari_id_elim" id="usuari_id_elim" >
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button id="submitEliminar" type="submit" class="btn btn-primary">Eliminar</button>
              </form>
        </div>
      </div>
    </div>
  </div>
