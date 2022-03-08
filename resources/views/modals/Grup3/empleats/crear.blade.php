<div class="modal fade" id="crear" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header.custom">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="title">Crear Usuari</h4>
            </div>
            <form action="{{route('empleats.store')}}" method="POST">
                @csrf
            <div class="modal-body">
                @role('Administrador')
                <div class="row form-group">
                    <div class="col-sm-5">
                    <label class="control-label" style="position:relative; top:7px;">Empresa: </label>
                    </div>
                    <div class="col-sm-7">
                    <select class="form-control" name="id_empresa" id="id_empresa" required>
                        @foreach ($empreses as $empresa)
                        <option value={{$empresa->id}}>{{$empresa->nom}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
                @else
                <div class="row form-group">
                    <div class="col-sm-5">
                    <label class="control-label" style="position:relative; top:7px;">Empresa: </label>
                    </div>
                    <div class="col-sm-7">
                    <select class="form-control cursor-not-allowed" name="id_empresa" id="id_empresa" required>
                        <option name="id_empresa" value={{$empreses->id}}>{{$empreses->nom}}</option>
                    </select>
                    </div>
                </div>
                @endrole
                <div class="form-group">
                    <label>Nom</label>
                    <input type="text" name="nom" class="form-control" placeholder="Ingresa un nom" maxlength="15" required>
                </div>
                <div class="form-group">
                    <label>Primer cognom</label>
                    <input type="text" name="cognom" class="form-control" placeholder="Ingresa el primer cognom" maxlength="15" required>
                </div>
                <div class="form-group">
                    <label>Segon cognom</label>
                    <input type="text" name="segon_cognom" class="form-control" placeholder="Ingresa el segon cognom" maxlength="15" required>
                </div>
                <div class="form-group">
                    <label>Rol:</label>
                    <select class="form-select" name="id_roles" id="rol" required>
                        <option value="3">Gestor Entitat</option>
                        <option value="6">Empleat</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>DNI/NIF</label>
                    <input type="text"
                           name="dni"
                           class="form-control"
                           placeholder="Ingresa un DNI/NIF"
                           maxlength="9"
                           minlength="9"
                           required>
                </div>
                <div class="form-group">
                    <label>Nom d'usuari</label>
                    <input type="text" name="user_name" class="form-control" placeholder="Ingresa un nom d'usuari" maxlength="15" required>
                </div>
                <div class="form-group">
                    <label>Contrasenya</label>
                    <input id= "confirmpassword" type="password" name="password_confirmation" class="form-control" placeholder="Ingresa una contrasenya" required>
                </div>
                <div class="form-group">
                    <label>Confirmar Contrasenya</label>
                    <input id= "password" type="password" name="password" class="form-control" placeholder="Torna a ingresar la contrasenya" required>
                </div>

                <div class="form-group">
                    <label>Correu electrònic</label>
                    <input type="email" name="email" class="form-control" placeholder="Ingresa un email" required>
                </div>
                <div class="form-group">
                    <label>Telèfon</label>
                    <input type="tel" id="telef" placeholder="Ingresa un número de telèfon" name="telefon"
                           pattern="[0-9]{9}"
                           required>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Sortir</button>
                <button id="submitCrear" type="submit" class="btn btn-primary">Afegir</button>
            </div>
             </form>

        </div>
    </div>
</div>

<script>

</script>
