//JQuery

selIncidencia = function(id, Nom,NomIn, Descripcio, Estat_incidencia) {
    $('.modal-title2').text('Editar incidencia: ' + Nom);
    $('#Incidencia_id').val(id);
    $("#formularieditar").attr("action", document.getElementById("formularieditar").getAttribute("action").replace("idaeditar", id));
    $('#nomIn').val(Nom);

    $('#Nom').val(NomIn);
    $('textarea#Descripcio').val(Descripcio);
    $('#estat_incidencia').val(Estat_incidencia);
}
    delIncidencia = function(id) {
        $('#incidencia_id_elim').val(id);
        $("#formularieliminar").attr("action", document.getElementById("formularieliminar").getAttribute("action").replace("idaeliminar", id));

    }

/*
window.onload = function() {
    var desc = document.getElementById('descipcio');
    desc.oninvalid = validardesc;
  }
  */

  function validardesc() {
    if (this.validity.valueMissing) {
      this.setCustomValidity('Escriu una descipció!');
      this.style.boxShadow = "0 0 5px 1px red";
    } else if(this.value === ''){
      this.setCustomValidity('Escriu una descipció!');
      this.style.boxShadow = "0 0 5px 1px red";
    }else{
      this.setCustomValidity('');
      this.style.boxShadow = "none";
    }
  }

//Validar espais en blanc
function validarForm() {

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
