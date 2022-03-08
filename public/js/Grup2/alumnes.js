
  deleteAlumno = function(id) {
    console.log(id);
    $('#alumne_id_eliminar').val(id);
    $("#formularieliminar").attr("action", document.getElementById("formularieliminar").getAttribute("action").replace("ideliminar", id));
}

selAlumne = function(Nom, Cognom, Segon_cognom, DNI, Usuari, Email, Telefon, id){
    $('.modal-title2').text('Editar alumne: '+Nom);
    $('#Nom').val(Nom);
    $('#Cognom').val(Cognom);
    $('#Segon_cognom').val(Segon_cognom);
    $('#DNI').val(DNI);
    $('#Usuari').val(Usuari);
    $('#Email').val(Email);
    $('#Telefon').val(Telefon);

    $('#alumne_id_editar').val(id);
    $("#formularieditar").attr("action", document.getElementById("formularieditar").getAttribute("action").replace("ideditar", id));
  }

