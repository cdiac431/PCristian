deleteProfessor = function(id) {
    $('#professor_id_eliminar').val(id);
    $("#formularieliminar").attr("action", document.getElementById("formularieliminar").getAttribute("action").replace("ideliminar", id));
}

selProfessor = function(Nom, Cognom, Segon_cognom, rol, DNI, Usuari, Email, Telefon, id, id_usuari){
    $('.modal-title2').text('Editar professor: '+Nom);
    $('#Nom').val(Nom);
    $('#Cognom').val(Cognom);
    $('#Segon_cognom').val(Segon_cognom);
    $('#rol_name').val(rol.toString());
    $('#DNI').val(DNI);
    $('#Usuari').val(Usuari);
    $('#Email').val(Email);
    $('#Telefon').val(Telefon);
    $('#id').val(id);
    $("#formularieditar").attr("action", document.getElementById("formularieditar").getAttribute("action").replace("ideditar", id_usuari));  }

