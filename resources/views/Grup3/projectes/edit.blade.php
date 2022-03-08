
    <div  class="modal fade bannerformmodal" id="editProjecte" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-content">
                    <div class="modal-header">
                        
                        <h4 class="modal-title2" id="myModalLabel"></h4>
                    </div>
                    <form method="POST" action="{{route('projectes.update', $projecte)}}">
                        @csrf
                        @method('put')
                    <div class="modal-body">
                        
                        <input id="id_projecte" name="id" type="hidden">

                        <div class="row form-group">
                            <div class="col-sm-5">
                                <label class="control-label" style="position:relative; top:7px;">Nom Projecte: </label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" if="nom_projecte" id="nom_projecte_update" name="nom_projecte" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un nom">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-5">
                                <label class="control-label" style="position:relative; top:7px;">Data Inici:</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="date" class="form-control" id="Datai" name="data_inici" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa una Localitat">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-5">
                                <label class="control-label" style="position:relative; top:7px;">Data Final:</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="date" class="form-control" id="Dataf" name="data_final" onfocus="focusFuncio(this)" onblur="treuColor(this)"  placeholder="Ingresa una Direcció">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" >Cancelar</button>
                        <button type="submit" class="btn btn-primary"> Actualitzar Projecte</button>
                
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
