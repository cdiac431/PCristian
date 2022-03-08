
    <div  class="modal fade bannerformmodal" id="crearProfessor" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
         <div class="modal-content">
           <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title" id="myModalLabel">Afegir nou Professor</h4>
             </div>
             <form method="POST" action="{{route('professors.store')}}">
             <div class="modal-body">
              @csrf
              @role('Administrador')
              <div class="row form-group">
                <div class="col-sm-5">
                  <label class="control-label" style="position:relative; top:7px;">Institut: </label>
                </div>
                <div class="col-sm-7">
                  <select class="form-control" name="id_institut" id="id_institut" required>
                    @foreach ($instituts as $institut)
                    @if($institut->estat === 'actiu')
                    <option value={{$institut->id}}>{{$institut->nom}}</option>
                    @endif
                    @endforeach
                </select>
                </div>
              </div>
              @else
              <div class="row form-group">
                <div class="col-sm-5">
                  <label class="control-label" style="position:relative; top:7px;">Institut: </label>
                </div>
                <div class="col-sm-7">
                  <select class="form-control cursor-not-allowed" name="id_institut" id="id_institut" required>
                  <option name="id_institut" value={{$instituts['id']}}>{{$instituts['nom']}}</option>
                </select>
                </div>
              </div>
              @endrole
               <div class="row form-group">
                 <div class="col-sm-5">
                   <label class="control-label" style="position:relative; top:7px;">Nom professor: </label>
                 </div>
                 <div class="col-sm-7">
                   <input type="text" id="nom" class="form-control" name="Nom" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un nom">
                 </div>
               </div>
               <div class="row form-group">
                 <div class="col-sm-5">
                   <label class="control-label" style="position:relative; top:7px;">Cognom:</label>
                 </div>
                 <div class="col-sm-7">
                  <input type="text" id="cognom"  class="form-control" name="Cognom" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un cognom">
                </div>
               </div>
               <div class="row form-group">
                <div class="col-sm-5">
                  <label class="control-label" style="position:relative; top:7px;">Segon cognom:</label>
                </div>
                <div class="col-sm-7">
                 <input type="text" id="segon_cognom" class="form-control" name="Segon_cognom" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un segon cognom">
               </div>
              </div>
              <div class="row form-group">
                <div class="col-sm-5">
                  <label class="control-label" style="position:relative; top:7px;">Rol:</label>
                </div>
                <div class="col-sm-7">
                  <select class="form-control" name="id_roles" id="rol" required>
                      <option value="2">Gestor Institut</option>
                      <option value="5">Professor</option>
                  </select>
                </div>
            </div>
              <div class="row form-group">
                <div class="col-sm-5">
                  <label class="control-label" style="position:relative; top:7px;">DNI:</label>
                </div>
                <div class="col-sm-7">
                 <input type="text" id="dni" class="form-control" name="Dni" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un DNI">
               </div>
              </div>
              <div class="row form-group">
                <div class="col-sm-5">
                  <label class="control-label" style="position:relative; top:7px;">Nom d'usuari:</label>
                </div>
                <div class="col-sm-7">
                 <input type="text" class="form-control" id="nom_usuari" name="User_Name" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un nom d'usuari">
                 <small class="error" aria-live="polite"></small>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-sm-5">
                  <label class="control-label" style="position:relative; top:7px;">Contrasenya:</label>
                </div>
                <div class="col-sm-7">
                 <input type="password" class="form-control" id="constrasenya" name="Password" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa una contrasenya">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-sm-5">
                  <label class="control-label" style="position:relative; top:7px;">Email:</label>
                </div>
                <div class="col-sm-7">
                 <input type="email" class="form-control" id="email" name="Email" value="{{old('CIF')}}" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un email">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-sm-5">
                  <label class="control-label" style="position:relative; top:7px;">Telèfon:</label>
                </div>
                <div class="col-sm-7">
                 <input type="number" class="form-control" id="telèfon" name="Telefon" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un telèfon">
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