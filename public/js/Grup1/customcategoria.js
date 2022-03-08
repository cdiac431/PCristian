//JQuery

selCategoria = function(id, Nom, Descripcio) {
    $('#cate_id').val(id);
    $('.modal-title2').text('Editar categoria: ' + Nom);
    $('#categoria_id').val(id);
    // console.log("action", document.getElementById("formularieditar").getAttribute("action").replace("idaeditar", id));
    $("#formularieditar").attr("action", document.getElementById("formularieditar").getAttribute("action").replace("idaeditar", id));

    $('#Nom').val(Nom);
    $('#Descripcio').val(Descripcio);
    // console.log("funciono");
}

delCategoria = function(id) {
    $('#categoria_id_elim').val(id);
    $("#formularieliminar").attr("action", document.getElementById("formularieliminar").getAttribute("action").replace("idaeleiminar", id));

}

//Validar espais en blanc
function validarForm() {

    var desc = document.getElementById('descipcio');

    if (desc.value === '') {
        desc.setCustomValidity('Escriu una descipció!');
        desc.style.boxShadow = "0 0 5px 1px red";
    } else {
        desc.setCustomValidity('');
        desc.style.boxShadow = "none";
    }

    var nom = document.getElementById('nom');

    if (nom.value === '') {
        nom.setCustomValidity('Escriu un Nom!');
        nom.style.boxShadow = "0 0 5px 1px red";
    } else {
        nom.setCustomValidity('');
        nom.style.boxShadow = "none";
    }
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
