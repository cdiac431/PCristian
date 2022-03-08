
    <div  class="modal fade bannerformmodal" id="crearInstitut" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
           <div class="modal-content">
             <div class="modal-content">
               <div class="modal-header">
                   <h4 class="modal-title" id="myModalLabel">Afegir nou Centre Educatiu</h4>
               </div>
               <form method="POST" action="{{route('instituts.store')}}">
               <div class="modal-body">
                @csrf
                 <div class="row form-group">
                   <div class="col-sm-5">
                     <label class="control-label" style="position:relative; top:7px;">Nom Centre Educatiu: </label>
                   </div>
                   <div class="col-sm-7">
                     <input type="text" id="nom" class="form-control" name="Nom" value="{{old('Nom')}}" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un nom">
                   </div>
                 </div>
                 <div class="row form-group">
                   <div class="col-sm-5">
                     <label class="control-label" style="position:relative; top:7px;">Localitat:</label>
                   </div>
                   <div class="col-sm-7">
                    <input type="text" id="localitat"  class="form-control" name="Localitat" value="{{old('Localitat')}}" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa una localitat">
                  </div>
                 </div>
                 <div class="row form-group">
                  <div class="col-sm-5">
                    <label class="control-label" style="position:relative; top:7px;">Adreça:</label>
                  </div>
                  <div class="col-sm-7">
                   <input type="text" id="direccio" class="form-control" name="direccio" value="{{old('direccio')}}" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa una adreça">
                 </div>
                </div>
                <div class="row form-group">
                  <div class="col-sm-5">
                    <label class="control-label" style="position:relative; top:7px;">Telèfon:</label>
                  </div>
                  <div class="col-sm-7">
                   <input type="tel" pattern="[0-9]{9}" id="tel" class="form-control" name="Telefon" value="{{old('Telefon')}}" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un telèfon">
                 </div>
                </div>
                <div class="row form-group">
                  <div class="col-sm-5">
                    <label class="control-label" style="position:relative; top:7px;">CIF:</label>
                  </div>
                  <div class="col-sm-7">
                   <input type="text" pattern="^[a-zA-Z]{1}\d{7}[a-zA-Z0-9]{1}$" class="form-control" id="Cif" name="CIF" value="{{old('CIF')}}" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un CIF">
                   <small class="error" aria-live="polite"></small>
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-sm-5">
                    <label class="control-label" style="position:relative; top:7px;">Email:</label>
                  </div>
                  <div class="col-sm-7">
                   <input type="email" class="form-control" id="email" name="Email" value="{{old('Email')}}" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un email">
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