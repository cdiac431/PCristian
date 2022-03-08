
<div class="modal fade" id="delGrup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Confirmar eliminació:</h3>
            </div>
            <div class="modal-body">
                <p>Estas segur que vols eliminar el grup?</p>
            </div>
            <div class="modal-footer">
                <form method="POST" id="formularieliminar" action="{{route('grups.destroy', $id ?? "idaeliminar")}}">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="grup_id_elim" id="grup_id_elim" >
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>

