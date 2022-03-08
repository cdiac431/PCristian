
    <div  class="modal fade bannerformmodal" id="editCategoria" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title2" id="myModalLabel"></h4>
                    </div>
                    <form method="POST" id="formularieditar" action="{{route('categories.update', $categoria)}}">
                        @csrf
                        @method('put')
                    <div class="modal-body">
                        <input type="hidden" name="id" id="cate_id" >
                        <div class="row form-group">
                          <div class="col-sm-5">
                            <label class="control-label" style="position:relative; top:7px;">Nom Categoria: </label>
                          </div>
                          <div class="col-sm-7">
                            <input type="text" id="Nom" class="form-control" name="nom" value="{{old('Nom')}}" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un nom">
                          </div>
                        </div>
                        <div class="row form-group">
                          <div class="col-sm-5">
                            <label class="control-label" style="position:relative; top:7px;">Descripció:</label>
                          </div>
                          <div class="col-sm-7">
                           <input type="text" id="Descripcio"  class="form-control" name="descripcio" value="{{old('Descripcio')}}" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa una Descripció">
                         </div>
                       </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" >Cancelar</button>
                        <button type="submit" class="btn btn-primary"> Actualitzar Categoria</button>

                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
