
    <div  class="modal fade bannerformmodal" id="editPressupost" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-content">
                    <div class="modal-header">  
                        <h4 class="modal-title2" id="myModalLabel"></h4>
                    </div>
                    <form method="POST" action="{{route('pressupostos.update', $pressupost)}}">
                        @csrf
                        @method('put')
                    <div class="modal-body">
                        
                        <input id="id" name="id" type="hidden">

                        <div class="row form-group">
                            <div class="col-sm-5">
                                <label class="control-label" style="position:relative; top:7px;">Concepte: </label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="nom_cost" name="nom_cost" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Posa el nom del pressupost">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-5">
                                <label class="control-label" style="position:relative; top:7px;">Preu unitari:</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="preu_cost" name="preu_cost" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Posa el preu del pressupost">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-5">
                                <label class="control-label" style="position:relative; top:7px;">Quantitat:</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="quantitat_cost" name="quantitat_cost" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa la quantitat">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" >Cancelar</button>
                        <button type="submit" class="btn btn-primary"> Actualitzar Pressupost</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
