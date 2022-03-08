
    <div  class="modal fade bannerformmodal" id="crearIncidencia" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true" style="display: none;">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
           <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title" id="myModalLabel">Afegir Nova Incidencia</h4>
             </div>
             <form method="POST" action="{{route('incidencies.store')}}">
             <div class="modal-body">
              @csrf
              <div class="row form-group">
                <div class="col-sm-5">
                    <label class="control-label" style="position:relative; top:7px;">Nom Usuari:</label>
                </div>
                <div class="col-sm-7">
                  <input name="id_usuari" value="{{auth()->user()->nom}}" class="cursor-not-allowed" required disabled>
                </div>
              </div>
               <div class="row form-group">
                 <div class="col-sm-5">
                   <label class="control-label" style="position:relative; top:7px;">Nom Incidència: </label>
                 </div>
                 <div class="col-sm-7">
                   <input type="text" id="nom" class="form-control" name="Nom" value="{{old('Nom')}}" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un nom">
                 </div>
               </div>
               <div class="row form-group">
                 <div class="col-sm-5">
                   <label class="control-label" style="position:relative; top:7px;">Descripció:</label>
                 </div>
                 <div class="col-sm-7">
                  <textarea type="text" id="Descripcio" rows="4" cols="30" class="form-control" name="Descripcio" value="{{old('Descripcio')}}" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa una Descripcio"></textarea>
                </div>
               </div>
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
             <button type="submit" onclick="validarForm()" class="btn btn-primary">Guardar Registre</button>
         </div>
       </div>
      </form>
      </div>
     </div>
    </div>
