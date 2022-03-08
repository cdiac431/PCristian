
    <div  class="modal fade bannerformmodal" id="crearCategoria" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true" style="display: none;">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
           <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title" id="myModalLabel">Afegir nova Categoria</h4>
             </div>
             <form method="POST" action="{{route('categories.store')}}">
             <div class="modal-body">
              @csrf
               <div class="row form-group">
                 <div class="col-sm-5">
                   <label class="control-label" style="position:relative; top:7px;">Nom Categoria: </label>
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
                  <input type="text" id="descripcio"  class="form-control" name="Descripcio" value="{{old('Descripcio')}}" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa una descripció">
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
