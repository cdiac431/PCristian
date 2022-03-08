
<div class="modal fade bannerformmodal" id="crearAlumne" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Afegir un nou alumne</h4>
                </div>
                <form method="POST" action="{{ route('alumnes.store') }}">
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
                            <label class="control-label" style="position:relative; top:7px;">Grup: </label>
                            </div>
                            <div class="col-sm-7">
                            <select class="form-control" name="id_grup_tutoria" id="id_grup_tutoria" required>
                                @foreach ($grups as $grup)
                                @if($grup->estat === 'actiu')
                                <option value={{$grup->id}}>{{$grup->nom}}</option>
                                @endif
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-5">
                                <label class="control-label" style="position:relative; top:7px;">Nom alumne: </label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="nom" onfocus="focusFuncio(this)"
                                    onblur="treuColor(this)" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-5">
                                <label class="control-label" style="position:relative; top:7px;">Cognom:</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="primer_cognom" onfocus="focusFuncio(this)"
                                    onblur="treuColor(this)" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-5">
                                <label class="control-label" style="position:relative; top:7px;">Segon cognom:</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="segon_cognom" onfocus="focusFuncio(this)"
                                    onblur="treuColor(this)" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-5">
                                <label class="control-label" style="position:relative; top:7px;">DNI/NIE:</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="dni" onfocus="focusFuncio(this)"
                                    onblur="treuColor(this)" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-5">
                                <label class="control-label" style="position:relative; top:7px;">Nom d'usuari:</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="nom_usuari" onfocus="focusFuncio(this)"
                                    onblur="treuColor(this)" required>
                                <small class="error" aria-live="polite"></small>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-5">
                                <label class="control-label" style="position:relative; top:7px;">Contrasenya:</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" name="contrasenya"
                                    onfocus="focusFuncio(this)" onblur="treuColor(this)" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-5">
                                <label class="control-label" style="position:relative; top:7px;">Email:</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="email" class="form-control" name="correu" value="{{ old('CIF') }}"
                                onfocus="focusFuncio(this)" onblur="treuColor(this)" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-5">
                                <label class="control-label" style="position:relative; top:7px;">Telèfon:</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="telefon" onfocus="focusFuncio(this)"
                                    onblur="treuColor(this)" required>
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

