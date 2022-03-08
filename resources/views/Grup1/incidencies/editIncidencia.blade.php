
    <div  class="modal fade bannerformmodal" id="editIncidencia" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title2" id="myModalLabel"></h4>
                    </div>
                    <form method="POST" id="formularieditar" action="{{route('incidencies.update', $incidencia)}}">
                        @csrf
                        @method('put')
                    <div class="modal-body">
                        <input type="hidden" name="id" id="Incidencia_id" >
                        <div class="row form-group">
                            <div class="col-sm-5">
                                <label class="control-label" style="position:relative; top:7px;">Nom Usuari:</label>
                            </div>
                            <div class="col-sm-7">
                              <input name="id_usuari" id="nomIn" class="cursor-not-allowed" disabled>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-5">
                                <label class="control-label" style="position:relative; top:7px;">Nom Incidència: </label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" class="cursor-not-allowed" if="nom" id="Nom" name="nom" onfocus="focusFuncio(this)" onblur="treuColor(this)" disabled placeholder="Ingresa un nom">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-5">
                                <label class="control-label" style="position:relative; top:7px;">Descripció:</label>
                            </div>
                            <div class="col-sm-7">
                                <textarea type="text" class="cursor-not-allowed" id="Descripcio" name="descripcio" onfocus="focusFuncio(this)" onblur="treuColor(this)" disabled placeholder="Ingresa una Descripcio"></textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-5">
                                <label class="control-label" style="position:relative; top:7px;">Estat Incidencia:</label>
                            </div>
                            <div class="col-sm-7">
                                <select type="text" class="form-control" id="estat_incidencia" name="estat_incidencia" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un estat">
                                    <option>Enviat</option>
                                    <option>En Procès</option>
                                    <option>Resolt</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" >Cancelar</button>
                        <button type="submit" class="btn btn-primary"> Actualitzar Incidencia</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
