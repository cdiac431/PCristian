<div class="modal fade" id="retornProjecte" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Retornar a proposta:</h3>
        </div>
        <div class="modal-body">
          <p>Estas segur que vols retornar <strong>{{$projecte->nom_projecte}}</strong> a proposta?</p>
          <form method="POST" id="formeliminar" action="{{route('projectes.retorn', $projecte->id)}}">
            @csrf
            @method('delete') 

            <input id="projecte_id_elim" name="id_projecte" type="hidden" value="{{$projecte->id}}">

            <div class="row form-group">
                <div class="col-sm-5">
                    <label class="control-label" style="position:relative; top:7px;">Motiu: </label>
                </div>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="motiu" name="motiu" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un motiu">
                </div>
            </div> 

        </div>
        <div class="modal-footer">
           

                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Confirmar</button>
              </form>
        </div>
      </div>
    </div>
  </div>

