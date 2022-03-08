
<div  class="modal fade bannerformmodal" id="editGrup" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title2" id="myModalLabel"></h4>
                </div>
                <form method="POST" id="formularieditar" action="{{route('grups.update', $grup)}}">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <input type="hidden" name="id" id="Grup_id">

                        <div class="row form-group">

                            <label class="col-md-4 col-form-label text-md-right" style="position:relative; top:7px;">Nom Grup: </label>

                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="Nom" name="nom" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un nom">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="profesor" class="col-md-4 col-form-label text-md-right">Professor</label>
                            
                            <div class="col-sm-7">

                                <select type="text" class="form-control" id="id_tutor" name="id_tutor" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Escull un profesor">
                                    @foreach($profesor as $profe)
                                        <option value="{{$profe->id}}">{{$profe->usuari->nom}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="institut" class="col-md-4 col-form-label text-md-right">Institut</label>

                            <div class="col-sm-7">

                                <select type="text" class="form-control"  id="id_institut" name="id_institut" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Escull un Centre">
                                    @foreach($institut as $instituts)
                                        <option value="{{$instituts->id}}">{{$instituts->nom}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" >Cancelar</button>
                        <button type="submit" class="btn btn-primary"> Actualitzar Grup</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


