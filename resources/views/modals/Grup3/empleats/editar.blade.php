<div class="modal fade" id="editar" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header.custom">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="title">Editar Usuari</h4>
            </div>
            <form method="POST" id="editform" action=''>
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="form-group align-content-end ">
                        <label for="Nom">Nom:</label><input value="{{ session()->get('user.nom') ?? '' }}" id="Nom"
                            type="text" name="nom" class="align-content-end" placeholder="" maxlength="15">

                    </div>
                    <div class="form-group">
                        <label>Primer cognom:</label> <input value="{{ session()->get('user.cognom') ?? '' }}"
                            type="text" name="cognom" class="" placeholder="cognom" maxlength="15">

                    </div>
                    <div class="form-group">
                        <label>Segon cognom</label>
                        <input type="text" value="{{ session()->get('user.segon_cognom') ?? '' }}" name="segon_cognom"
                            class="" placeholder="cognom" maxlength="15">
                    </div>
                    <div id="editrol" class="form-group">
                        <label>Rol:</label> <select class="form-select" name="id_roles">
                            <option value="3">Gestor Entitat</option>
                            <option value="6">Empleat</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>DNI/NIF:</label> <input type="text" value="{{ session()->get('user.dni') ?? '' }}"
                            name="dni" class="" placeholder="DNI/NIF" maxlength="9" minlength="9">
                    </div>

                    <div class="form-group">
                        <label>Nom d'usuari:</label> <input value="{{ session()->get('user.user_name') ?? '' }}"
                            type="text" name="user_name" class="cursor-not-allowed" placeholder="Nom d'usuari"
                            maxlength="15" disabled>

                    </div>
                    <div class="form-group">
                        <label>Contrasenya:</label> <input id="editconfirmpassword" type="password" name="password"
                            class="" placeholder="Contrasenya">

                    </div>
                    <div class="form-group">
                        <label>Confirmar contrasenya:</label><input id="editpassword" type="password" name="password"
                            class="" placeholder="Contrasenya">

                    </div>


                    <div class="form-group">
                        <label>Correu electrònic:</label>
                        <input value="{{ session()->get('user.email') ?? '' }}" type="email" name="email" class=""
                            placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label>Telefon</label>
                        <input value="{{ session()->get('user.telefon') ?? '' }}" type="tel" id="telef" name="telefon"
                            pattern="[0-9]{9}">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Sortir</button>
                    <button id="submitEditar" type="submit" class="btn btn-primary">Actualitzar</button>
                </div>
            </form>

        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(".form-group#edittipus select").val("{{ session()->get('user.tipus') }}")
    $(".form-group#editrol select").val("{{ session()->get('user.id_roles') }}")

</script>
