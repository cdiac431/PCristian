<div  class="modal fade bannerformmodal" id="editPost" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
       <div class="modal-content">
         <div class="modal-content">
           <div class="modal-header">
               <h4 class="modal-title" id="myModalLabel">Editar Post</h4>
           </div>
           <form id="formularieditar" method="POST" action="{{route('blogs.update', $id ?? 'ideditar')}}" enctype="multipart/form-data">
              <div class="modal-body">
               @csrf
               <input type="hidden" name="id" id="post_id" >
               @method('put')
               <div class="row form-group">
                 <div class="col-sm-12">
                   <label class="control-label" style="position:relative; top:7px;">Titol: </label>
                 </div>
                 <div class="col-sm-12">
                  <input type="text" id="titol" class="form-control" name="titol" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un titol">
                </div>
               </div>
                <div class="row form-group">
                  <div class="col-sm-12">
                    <label class="control-label" style="position:relative; top:7px;">Resum: </label>
                  </div>
                  <div class="col-sm-12">
                    <textarea rows="7" cols="50" type="text" id="entradeta" class="form-control" name="entradeta" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un resum"></textarea>
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-sm-5">
                    <label class="control-label" style="position:relative; top:7px;">Contingut:</label>
                  </div>
                  <div class="col-sm-12">
                   <textarea type="text" id="contingute"  class="form-control" name="contingute" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa el contingut"></textarea>
                 
                  </div>
                </div>
                <div class="row form-group">
                 <div class="col-sm-12">
                   <label class="control-label" style="position:relative; top:7px;">Imatge:</label>
                 </div>
                 <div class="col-sm-12">
                  @include('dragndrop',['required' => false, 'name' => 'ruta_blog', 'multiple' => false, 'mimetypes' => ['image/jpeg', 'image/png']])
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
