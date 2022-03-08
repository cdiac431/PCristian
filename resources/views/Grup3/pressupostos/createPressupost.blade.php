
<div  class="modal fade bannerformmodal" id="crearPressupost" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Afegir Nou Pressupost</h4>
          </div>
          <form method="POST" action="{{route('pressupostos.store')}}">
        <div class="modal-body">
          @csrf
          <div class="row form-group">
            <div class="col-sm-5">
              <label class="control-label" style="position:relative; top:7px;">Id del pressupost: </label>
            </div>
            <div class="col-sm-7">
              <input type="text" id="id_pressupost_nou" class="form-control" name="id_pressupost" value="{{old('id_pressupost')}}" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Posa el nom del pressupost">
            </div>
          </div>
            <div class="row form-group">
              <div class="col-sm-5">
                <label class="control-label" style="position:relative; top:7px;">Concepte: </label>
              </div>
              <div class="col-sm-7">
                <input type="text" id="nom_cost_nou" class="form-control" name="Nom_cost" value="{{old('Nom_cost')}}" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Posa el nom del pressupost">
              </div>
            </div>
            <div class="row form-group">
              <div class="col-sm-5">
                <label class="control-label" style="position:relative; top:7px;">Preu Unitari:</label>
              </div>
              <div class="col-sm-7">
              <input type="text" id="preu_cost_nou"  class="form-control" name="Preu_cost" value="{{old('Preu_cost')}}" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Posa el preu del pressupost">
            </div>
            </div>
            <div class="row form-group">
            <div class="col-sm-5">
              <label class="control-label" style="position:relative; top:7px;">Quantitat:</label>
            </div>
            <div class="col-sm-7">
              <input type="text" id="quantitat_cost_nou" class="form-control" name="Quantitat_cost" value="{{old('Quantitat_cost')}}" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa la quantitat">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="submit" onclick="validarForm()" class="btn btn-primary"> Guardar Registre</button>
        </div>
      </div>
          </form>
    </div>
  </div>
</div> 