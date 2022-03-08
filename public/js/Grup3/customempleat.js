//JQuery
selEmpleat = function (id, id_empresa, id_usuari, nss) {
    $('#emp_id').val(id);
    $('.modal-title2').text('Editar empleat: ' + id_usuari);
    $('#ID_empresa').val(id_empresa);
    $('#ID_usuari').val(id_usuari);
    $('#NSS').val(nss);
}

delEmpleat = function (id) {
    $('#empleat_id_elim').val(id);

    $("#formularieliminar").attr("action", document.getElementById("formularieliminar").getAttribute("action").replace("idaeliminar", id));

}

//validacions formularis

window.onload = function () {
    var cif = document.getElementById('Cif');
    //cif.oninput = validarCif;

    var tel = document.getElementById('tel');
    //tel.oninput = validarTel;
}

//Validar CIF
function validarCif() {
    if (this.validity.patternMismatch) {
        this.setCustomValidity('Ha de ser un CIF valid!');
        this.style.boxShadow = "0 0 5px 1px red";
    } else if (this.value === '') {
        this.setCustomValidity('Escriu un CIF!');
        this.style.boxShadow = "0 0 5px 1px red";
    } else {
        this.setCustomValidity('');
        this.style.boxShadow = "none";
    }
}

//Validar Telefon
function validarTel() {
    if (this.validity.patternMismatch) {
        this.setCustomValidity('Ha de ser un telefon correcte!');
        this.style.boxShadow = "0 0 5px 1px red";
    } else if (this.value === '') {
        this.setCustomValidity('Escriu un Telefon!');
        this.style.boxShadow = "0 0 5px 1px red";
    } else {
        this.setCustomValidity('');
        this.style.boxShadow = "none";
    }
}

//Validar espais en blanc
function validarForm() {

    var loc = document.getElementById('id_empresa');

    if (loc.value === '') {
        loc.setCustomValidity('Necessites escriure una empresa!');
        loc.style.boxShadow = "0 0 5px 1px red";
    } else {
        loc.setCustomValidity('');
        loc.style.boxShadow = "none";
    }

    var nom = document.getElementById('id_usuari');

    if (nom.value === '') {
        nom.setCustomValidity('Necessites escriure un identificador d\'usuari!');
        nom.style.boxShadow = "0 0 5px 1px red";
    } else {
        nom.setCustomValidity('');
        nom.style.boxShadow = "none";
    }
}

//Focus
function focusFuncio(x) {
    x.style.background = "#D4D0D0"; //potser canviar
}


//Blur
treuColor

function treuColor(x) {
    x.style.backgroundColor = "white";
}
