<div  class="modal fade bannerformmodal" id="editAlumne" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-content">
         <div class="modal-header">
             <h4 class="modal-title" id="myModalLabel">Editar alumne:</h4>
         </div>

         <form id = "formularieditar" method="POST" action="{{route('alumnes.update', $id ?? 'ideditar')}}">

         <div class="modal-body">
          @csrf
          @method('put')
           <div class="row form-group">
             <div class="col-sm-5">
               <label class="control-label" style="position:relative; top:7px;">Nom Alumne: </label>
             </div>
             <div class="col-sm-7">
               <input type="text" id="Nom" class="form-control" name="nom" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un nom">
             </div>
           </div>
           <div class="row form-group">
             <div class="col-sm-5">
               <label class="control-label" style="position:relative; top:7px;">Cognom:</label>
             </div>
             <div class="col-sm-7">
              <input type="text" id="Cognom"  class="form-control" name="cognom" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un cognom">
            </div>
           </div>
           <div class="row form-group">
            <div class="col-sm-5">
              <label class="control-label" style="position:relative; top:7px;">Segon cognom:</label>
            </div>
            <div class="col-sm-7">
             <input type="text" id="Segon_cognom" class="form-control" name="segon_cognom" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un segon cognom">
           </div>
          </div>
          <div class="row form-group">
            <div class="col-sm-5">
              <label class="control-label" style="position:relative; top:7px;">DNI/NIE:</label>
            </div>
            <div class="col-sm-7">
             <input type="text" id="DNI" class="form-control" name="dni" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un DNI">
           </div>
          </div>
          <div class="row form-group">
            <div class="col-sm-5">
              <label class="control-label" style="position:relative; top:7px;">Nom d'usuari:</label>
            </div>
            <div class="col-sm-7">
             <input type="text" class="form-control" id="Usuari" name="user_name" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un nom d'usuari">
             <small class="error" aria-live="polite"></small>
            </div>
          </div>
          <div class="row form-group">
            <div class="col-sm-5">
              <label class="control-label" style="position:relative; top:7px;">Contrasenya:</label>
            </div>
            <div class="col-sm-7">
             <input type="password" class="form-control" id="Contrasenya" name="password" onfocus="focusFuncio(this)" onblur="treuColor(this)" placeholder="Ingresa una nova contrasenya">
            </div>
          </div>
          <div class="row form-group">
            <div class="col-sm-5">
              <label class="control-label" style="position:relative; top:7px;">Email:</label>
            </div>
            <div class="col-sm-7">
             <input type="email" class="form-control" id="Email" name="email" value="{{old('CIF')}}" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un Email">
            </div>
          </div>
          <div class="row form-group">
            <div class="col-sm-5">
              <label class="control-label" style="position:relative; top:7px;">Telèfon:</label>
            </div>
            <div class="col-sm-7">
             <input class="form-control" id="Telefon" name="telefon" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un telèfon">
            </div>
          </div>
       </div>
       <div class="modal-footer">
         <input type="hidden" name = "alumne_id_editar" id="alumne_id_editar" >
         <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
         <button type="submit" class="btn btn-primary"> Actualitzar Registre</button>
     </div>
   </div>
  </form>
  </div>
  </div>
</div> 