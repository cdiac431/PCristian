<div class="modal fade" id="deletemodal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content" style="border-radius: 1px">
            <div class="modal-header.custom text-center">
                <button style='margin-right: 6px' type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="title">Atenció!</h4>
            </div>
            <form action="{{route('empleats.deleteall')}}" method="POST" id="eliminarform">
                @csrf
            <div class="modal-body"> Estas segur que vols eliminar els usuaris seleccionats?</div>
            <div class="modal-footer">
                <button id="submitEliminar" type="submit" class="btn bg-danger text-white w-100 float-left">Eliminar</button>
                <button type="button" class="btn btn-secondary text-white w-100" data-dismiss="modal">Sortir</button>

            </div>
            </form>
        </div>
    </div>
</div>
