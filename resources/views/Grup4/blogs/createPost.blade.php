
    <div  class="modal fade bannerformmodal" id="crearPost" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true" style="display: none;" >
        <div class="modal-dialog modal-dialog-centered modal-lg">
           <div class="modal-content">
             <div class="modal-content">
               <div class="modal-header">
                   <h4 class="modal-title" id="myModalLabel">Afegir Nou Post</h4>
               </div>
               <form method="POST" action="{{route('blogs.store')}}" enctype="multipart/form-data">
               <div class="modal-body">
                @csrf
                <div class="row form-group">
                  <div class="col-sm-12">
                      <label class="control-label" style="position:relative; top:7px;">Titol del Post:</label>
                  </div>
                  <div class="col-sm-12">
                    <input type="text" id="titol" class="form-control" name="titol" value="{{old('Titol')}}" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un titol">
                  </div>
                </div>
                 <div class="row form-group">
                   <div class="col-sm-12">
                     <label class="control-label" style="position:relative; top:7px;">Resum del post: </label>
                   </div>
                   <div class="col-sm-12">
                    <textarea rows="7" cols="50" type="text" id="entradeta" rows="4" cols="30" class="form-control" name="entradeta" value="{{old('Entradeta')}}" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un Resum"></textarea>
                   </div>
                 </div>
                 <div class="row form-group">
                   <div class="col-sm-12">
                     <label class="control-label" style="position:relative; top:7px;">Contingut del Post:</label>
                   </div>
                   <div class="col-sm-12">
                    <textarea type="text" id="contingut" rows="4" cols="30" class="form-control" name="contingut" value="{{old('Contingut')}}" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un Contingut"></textarea>
                  </div>
                 </div>
                 <div class="row form-group">
                  <div class="col-sm-12">
                    <label class="control-label" style="position:relative; top:7px;">Imatge del Post:</label>
                  </div>
                  <div class="col-sm-12">
                  @include('dragndrop',['required' => false, 'name' => 'ruta_blog', 'multiple' => false, 'mimetypes' => ['image/jpeg', 'image/png']])


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
  