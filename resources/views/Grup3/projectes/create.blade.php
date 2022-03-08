
    <div  class="modal fade bannerformmodal" id="crearProjecte" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
         <div class="modal-content">
           <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title" id="myModalLabel">Afegir nou Projecte</h4>
             </div>

             <!-- route va a controller i crida a la funció store-->
             <form method="POST" action="{{route('projectes.store')}}">
             <div class="modal-body">
              @csrf
              <div class="row form-group">
                 <div class="col-sm-5">
                   <label class="control-label" style="position:relative; top:7px;">Identificador de la proposta: </label>
                 </div>
                 <div class="col-sm-7">
                   <input type="text" id="id_proposta" class="form-control" name="id_proposta" value="{{old('id_proposta')}}" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa l'identificador">
                 </div>
               </div>
               <div class="row form-group">
                 <div class="col-sm-5">
                   <label class="control-label" style="position:relative; top:7px;">Data Inici: </label>
                 </div>
                 <div class="col-sm-7">
                   <input type="date" min="2016-01-01" max="2022-01-01" id="data_inici" class="form-control" name="data_inici" value="{{old('nom_projecte')}}" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Data inici">
                 </div>
               </div>
               <div class="row form-group">
                 <div class="col-sm-5">
                   <label class="control-label" style="position:relative; top:7px;">Nom projecte: </label>
                 </div>
                 <div class="col-sm-7">
                   <input type="text" id="nom_projecte" class="form-control" name="nom_projecte" value="{{old('nom_projecte')}}" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un nom">
                 </div>
               </div>
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>

             <!--Revisar "validarForm()", maybe index-->
             <button type="submit" onclick="validarForm()" class="btn btn-primary"> Guardar Registre</button>
         </div>
       </div>
      </form>
      </div>
     </div>
    </div> 