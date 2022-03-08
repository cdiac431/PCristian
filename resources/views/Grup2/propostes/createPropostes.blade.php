
    <div  class="modal fade bannerformmodal" id="crearProposta" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
         <div class="modal-content">
           <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title" id="myModalLabel">Afegir nova Proposta</h4>
             </div>
             <form method="POST" action="{{route('propostes.store')}}" enctype="multipart/form-data">
             <div class="modal-body">
              @csrf
              <div class="row form-group">
                <div class="col-sm-5">
                  <label class="control-label" style="position:relative; top:7px;">Categoria de la proposta: </label>
                </div>
                <div class="col-sm-7">
                 <select type="text" class="form-control" name="id_categoria" id="Categoria" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un estat">
                    @foreach($categories as $categoria)
                     <option value="{{$categoria->id}}">{{$categoria->nom}}</option>
                    @endforeach
                 </select>
                </div>
              </div>
               <div class="row form-group">
                 <div class="col-sm-5">
                   <label class="control-label" style="position:relative; top:7px;">Nom de la proposta: </label>
                 </div>
                 <div class="col-sm-7">
                   <input type="text" id="nom" class="form-control" name="nom" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un nom">
                 </div>
               </div>
               <div class="row form-group">
                 <div class="col-sm-5">
                   <label class="control-label" style="position:relative; top:7px;">Descripció:</label>
                 </div>
                 <div class="col-sm-7">
                  <input type="text" id="descripcio"  class="form-control" name="descripcio" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa una descripció">
                </div>
               </div>
               <div class="row form-group">
                <div class="col-sm-5">
                  <label class="control-label" style="position:relative; top:7px;">Requisits de la proposta:</label>
                </div>
                <div class="col-sm-7">
                 <input type="text" id="requisits" class="form-control" name="requeriments" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa els requisits de la proposta">
               </div>
              </div>
              <div class="row form-group">
                <div class="col-sm-5">
                  <label class="control-label" style="position:relative; top:7px;">Estimació econòmica:</label>
                </div>
                <div class="col-sm-7">
                 <input type="text" id="estimacio" class="form-control" name="estimacio_economica" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa una estimació econòmica">
               </div>
              </div>
              <div class="row form-group">
                <div class="col-sm-5">
                  <label class="control-label" style="position:relative; top:7px;">Imatge de la proposta</label>
                </div>
                <div class="col-sm-7">
                  <input style="padding-left: 8%;" type="file" name="ruta_imatge" id="file" accept="image/x-png,image/jpeg,image/jpg" size="6000" >
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
