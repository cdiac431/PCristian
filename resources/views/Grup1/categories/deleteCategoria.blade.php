
<div class="modal fade" id="delCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Confirmar eliminació:</h3>
        </div>
        <div class="modal-body">
          <p>Estas segur que vols eliminar la categoria?</p>
        </div>
        <div class="modal-footer">
            <form method="POST" id="formularieliminar"action="{{route('categories.destroy', $id ?? "idaeleiminar")}}">
                @csrf
                @method('delete')
                <input type="hidden" name="categoria_id_elim" id="categoria_id_elim" >
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Eliminar</button>
              </form>
        </div>
      </div>
    </div>
  </div>
