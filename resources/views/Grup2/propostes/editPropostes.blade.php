    <div  class="modal fade bannerformmodal" id="editProposta" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true">
        <div class="modal-dialog">
           <div class="modal-content">
             <div class="modal-content">
               <div class="modal-header">
                   <h4 class="modal-title" id="myModalLabel">Editar Proposta</h4>
               </div>

               <form id = "formularieditarProposta" method="POST" action="{{route('propostes.update', $id ?? 'ideditar')}}" enctype="multipart/form-data">

                  <div class="modal-body">
                   @csrf
                   @method('put')
                   <div class="row form-group">
                     <div class="col-sm-5">
                       <label class="control-label" style="position:relative; top:7px;">Categoria de la Proposta: </label>
                     </div>
                     <div class="col-sm-7">
                      <select type="text" class="form-control" name="id_categoria" id="categoria" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un estat">
                        @foreach($categories as $categoria)
                          <option value="{{$categoria->id}}">{{$categoria->nom}}</option>
                          @endforeach
                      </select>
                     </div>
                   </div>
                    <div class="row form-group">
                      <div class="col-sm-5">
                        <label class="control-label" style="position:relative; top:7px;">Nom de la Proposta: </label>
                      </div>
                      <div class="col-sm-7">
                        <input type="text" id="noM" class="form-control" name="nom" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un nom">
                      </div>
                    </div>
                    <div class="row form-group">
                      <div class="col-sm-5">
                        <label class="control-label" style="position:relative; top:7px;">Descripció:</label>
                      </div>
                      <div class="col-sm-7">
                       <input type="text" id="descripciO"  class="form-control" name="descripcio" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa una Descripcio">
                     </div>
                    </div>
                    <div class="row form-group">
                     <div class="col-sm-5">
                       <label class="control-label" style="position:relative; top:7px;">Requisits de la proposta:</label>
                     </div>
                     <div class="col-sm-7">
                      <input type="text" id="requisitS" class="form-control" name="requeriments" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa els requisits de la proposta">
                    </div>
                   </div>
                   <div class="row form-group">
                     <div class="col-sm-5">
                       <label class="control-label" style="position:relative; top:7px;">Estimacio econòmica:</label>
                     </div>
                     <div class="col-sm-7">
                      <input type="text" id="estimaciO" class="form-control" name="estimacio_economica" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa una estimació econòmica">
                    </div>
                   </div>
                   <div class="row form-group">
                     <div class="col-sm-5">
                       <label class="control-label" style="position:relative; top:7px;">Estat de la Proposta:</label>
                     </div>
                     <div class="col-sm-7">
                      <select type="text" class="form-control" name="estat_proposta" id="estatPropoS" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa l'estat de la proposta">
                        <option value="Disponible">Disponible</option>
                        <option value="Sol·licitada">Sol·licitada</option>
                        <option value="Assignada">Assignada</option>
                      </select>
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
               <input type="hidden" name = "id" id="proposta_id_editar" >
               <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
               <button type="submit" class="btn btn-primary"> Actualitzar Registre</button>
           </div>
         </div>
        </form>
        </div>
        </div>
    </div>
    </div>
