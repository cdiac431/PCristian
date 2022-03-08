


    <div  class="modal fade bannerformmodal" id="editUsuari" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true" style="display: none;">

      <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title2" id="myModalLabel"></h4>
                    </div>


                    <form id="form_edit_user" method="POST" action="{{route('usuaris.update', $id ?? "idaeditar")}}">
                        @csrf
                        @method('put')
                        <input type="hidden" name="id" id="usuari_id_elim" >

                    <div class="modal-body">
                      <div class="row form-group">
                        <div class="col-sm-5">
                          <label class="control-label" style="position:relative; top:7px;">Nom: </label>
                        </div>
                        <div class="col-sm-7">
                          <input type="text" id="Nom" class="form-control" name="nom" value="{{old('nom')}}" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un nom">
                        </div>
                      </div>
                      <div class="row form-group">
                        <div class="col-sm-5">
                          <label class="control-label" style="position:relative; top:7px;">Cognom: </label>
                        </div>
                        <div class="col-sm-7">
                          <input type="text" id="Cognom" class="form-control" name="cognom" value="{{old('cognom')}}" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un Cognom">
                        </div>
                      </div>
                      <div class="row form-group">
                        <div class="col-sm-5">
                          <label class="control-label" style="position:relative; top:7px;">Segon Cognom: </label>
                        </div>
                        <div class="col-sm-7">
                          <input type="text" id="SegonCognom" class="form-control" name="segon_cognom" value="{{old('segon_cognom')}}" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa el Segon Cognom">
                        </div>
                      </div>
                      <div class="row form-group">
                        <div class="col-sm-5">
                          <label class="control-label" style="position:relative; top:7px;">DNI: </label>
                        </div>
                        <div class="col-sm-7">
                          <input type="text" id="DNIUsuari" pattern="[0-9]{8}[A-Za-z]{1}" class="form-control" name="dni" value="{{old('dni')}}" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un DNI">
                        </div>
                      </div>
                      <div class="row form-group">
                        <div class="col-sm-5">
                          <label class="control-label" style="position:relative; top:7px;">Nom Usuari: </label>
                        </div>
                        <div class="col-sm-7">
                          <input type="text" id="Username" class="form-control" name="user_name" value="{{old('user_name')}}" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un nom d'usuari">
                        </div>
                      </div>
                      <div class="row form-group">
                        <div class="col-sm-5">
                          <label class="control-label" style="position:relative; top:7px;">Contrasenya: </label>
                        </div>
                        <div class="col-sm-7">
                          <input type="password" id="Password" class="form-control" name="password" value="{{old('password')}}" onfocus="focusFuncio(this)" onblur="treuColor(this)" placeholder="Ingresa una Contrasenya Nova">
                        </div>
                      </div>
                      <div class="row form-group">
                        <div class="col-sm-5">
                          <label class="control-label" style="position:relative; top:7px;">Email: </label>
                        </div>
                        <div class="col-sm-7">
                          <input type="email" id="Email" class="form-control" name="email" value="{{old('email')}}" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un email">
                        </div>
                      </div>
                      <div class="row form-group">
                        <div class="col-sm-5">
                          <label class="control-label" style="position:relative; top:7px;">Telèfon: </label>
                        </div>
                        <div class="col-sm-7">
                          <input type="tel" id="Telefon" class="form-control" name="telefon" value="{{old('telefon')}}" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un telefon">
                        </div>
                      </div>
                      <div class="row form-group">
                        <div class="col-sm-5">
                          <label class="control-label" style="position:relative; top:7px;">Data Naixement: </label>
                        </div>
                        <div class="col-sm-7">
                          <input type="date" id="DataNaixement" class="form-control" name="data_naixement" value="{{old('data_naixement')}}" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa la data de naixement">
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" >Cancelar</button>
                        <button type="submit" class="btn btn-primary"> Actualitzar Usuari</button>

                    </div>
                </form>
                </div>
            </div>
      </div>
  </div>
