//JQuery

selUsuari = function(tipus, id, Nom, Cognom, SegonCognom, DNIUsuari, UserName, Email, Telefon, DataNaixement) {
    $('.modal-title2').text('Editar usuari: ' + Nom);
    $('#usuari_id_elim').val(id);
    // console.log("action", document.getElementById("formularieditar").getAttribute("action").replace("idaeditar", id));
    $("#form_edit_user").attr("action", document.getElementById("form_edit_user").getAttribute("action").replace("idaeditar", id));

    $('#Nom').val(Nom);
    $('#tipus').val(tipus);
    $('#Cognom').val(Cognom);
    $('#SegonCognom').val(SegonCognom);
    $('#DNIUsuari').val(DNIUsuari);
    $('#Username').val(UserName);
    $('#Email').val(Email);
    $('#Telefon').val(Telefon);
    $('#DataNaixement').val(DataNaixement);
}
// usuari_id_elim
delUsuari = function(id) {
    $('#categoria_id_elim').val(id);
    $("#formulari_eliminar_user").attr("action", document.getElementById("formulari_eliminar_user").getAttribute("action").replace("iddestroy", id));

}
//Focus
function focusFuncio(x) {
    x.style.background = "#fafafa"; //potser canviar
}


//Blur
treuColor

function treuColor(x) {
    x.style.backgroundColor = "white";
}
