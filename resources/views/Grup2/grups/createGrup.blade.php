
<div  class="modal fade bannerformmodal" id="crearGrup" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Afegir nou Grup</h4>
                </div>
                <form method="POST" action="{{route('grups.store')}}">
                    <div class="modal-body">
                        @csrf
                        <div class="row form-group">
                            
                            <label class="col-md-4 col-form-label text-md-right" style="position:relative; top:7px;">Nom grup: </label>

                            <div class="col-sm-7">
                                <input type="text" id="nom" class="form-control" name="Nom" value="{{old('Nom')}}" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Ingresa un nom">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_tutor" class="col-md-4 col-form-label text-md-right">Professor</label>

                            <div class="col-sm-7">

                                <select type="text" name="id_tutor" class="form-control" onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Escull un profesor">
                                    @foreach($profesor as $profe)

                                            <option value="{{$profe->id}}">{{$profe->usuari->nom}}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_institut" class="col-md-4 col-form-label text-md-right">Centre Educatiu</label>

                            <div class="col-sm-7">

                                <select type="text" name="id_institut" class="form-control"  onfocus="focusFuncio(this)" onblur="treuColor(this)" required placeholder="Escull un centre">
                                    @foreach($institut as $instituts)
                                            <option value="{{$instituts->id}}">{{$instituts->nom}}</option>
                                    @endforeach
                                </select>
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
