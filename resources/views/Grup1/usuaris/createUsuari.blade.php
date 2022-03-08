
    <div  class="modal fade bannerformmodal" id="crearUsuari" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true" style="display: none;">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
           <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title" id="myModalLabel">Afegir nou usuari</h4>
             </div>
             <form method="POST" action="{{route('usuaris.store')}}">
             <div class="modal-body">
              @csrf
               <div class="row form-group">
                 <div class="col-sm-5">
                   <label class="control-label" style="position:relative; top:7px;">Nom: </label>
                 </div>
                 <div class="col-sm-7">
                   <input type="text" id="nom" class="form-control" name="nom" value="{{old('nom')}}" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un nom">
                 </div>
               </div>
               <div class="row form-group">
                 <div class="col-sm-5">
                   <label class="control-label" style="position:relative; top:7px;">Cognom: </label>
                 </div>
                 <div class="col-sm-7">
                   <input type="text" id="cognom" class="form-control" name="cognom" value="{{old('cognom')}}" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un cognom">
                 </div>
               </div>
               <div class="row form-group">
                 <div class="col-sm-5">
                   <label class="control-label" style="position:relative; top:7px;">Segon Cognom: </label>
                 </div>
                 <div class="col-sm-7">
                   <input type="text" id="segoncognom" class="form-control" name="segon_cognom" value="{{old('segon_cognom')}}" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa el segon cognom">
                 </div>
               </div>
               <div class="row form-group">
                 <div class="col-sm-5">
                   <label class="control-label" style="position:relative; top:7px;">DNI: </label>
                 </div>
                 <div class="col-sm-7">
                   <input type="text" id="dni" pattern="[0-9]{8}[A-Za-z]{1}" class="form-control" name="dni" value="{{old('dni')}}" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="ingresa un DNI">
                 </div>
               </div>
               <div class="row form-group">
                 <div class="col-sm-5">
                   <label class="control-label" style="position:relative; top:7px;">Nom Usuari: </label>
                 </div>
                 <div class="col-sm-7">
                   <input type="text" id="username" class="form-control" name="user_name" value="{{old('user_name')}}" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un nom d'usuari">
                 </div>
               </div>
               <div class="row form-group">
                 <div class="col-sm-5">
                   <label class="control-label" style="position:relative; top:7px;">Contrasenya: </label>
                 </div>
                 <div class="col-sm-7">
                   <input type="password" id="password" class="form-control" name="password" value="{{old('password')}}" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa una contrasenya">
                 </div>
               </div>
               <div class="row form-group">
                <div class="col-sm-5">
                  <label class="control-label" style="position:relative; top:7px;">Rol: </label>
                </div>
                <div class="col-sm-7">
                 <select type="text" class="form-control" name="id_roles" id="estatIncidencia" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un estat">
                   @foreach($roles as $rol)
                     <option>{{$rol->name}}</option>
                     @endforeach
                 </select>
                </div>
              </div>
               <div class="row form-group">
                 <div class="col-sm-5">
                   <label class="control-label" style="position:relative; top:7px;">Email: </label>
                 </div>
                 <div class="col-sm-7">
                   <input type="email" id="email" class="form-control" name="email" value="{{old('email')}}" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un email">
                 </div>
               </div>
               <div class="row form-group">
                 <div class="col-sm-5">
                   <label class="control-label" style="position:relative; top:7px;">Telèfon: </label>
                 </div>
                 <div class="col-sm-7">
                   <input type="tel" id="telefon" class="form-control" name="telefon" value="{{old('telefon')}}" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un telèfon">
                 </div>
               </div>
               <div class="row form-group">
                 <div class="col-sm-5">
                   <label class="control-label" style="position:relative; top:7px;">Data Naixement: </label>
                 </div>
                 <div class="col-sm-7">
                   <input type="date" id="datanaixement" class="form-control" name="data_naixement" value="{{old('data_naixement')}}" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa la data de naixement">
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
    </div>
