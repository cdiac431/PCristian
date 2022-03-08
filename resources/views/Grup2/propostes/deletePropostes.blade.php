
<div class="modal fade" id="deleteProposta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Confirmar eliminació:</h3>
        </div>
        <div class="modal-body">
          <p id="segur"></p>
        </div>
        <div class="modal-footer">
            <form id = "formularieliminar" method="POST" action="{{route('propostes.destroy', $id ?? 'ideliminar')}}">
                @csrf
                 @method('delete')
                <input type="hidden" name = "proposta_id_elimin" id="proposta_id_elimin" >
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Eliminar</button>
              </form>
        </div>
      </div>
    </div>
  </div>
