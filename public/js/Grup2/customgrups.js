//JQuery

selGrup = function(id, Nom, Profesor, Institut) {
    $('.modal-title2').text('Editar Grup: '+Nom);
    $('#Grup_id').val(id);

    $("#formularieditar").attr("action", document.getElementById("formularieditar").getAttribute("action").replace("idaeditar", id));
    $('#Nom').val(Nom);
    $('#id_tutor').val(Profesor.toString());
    $('#id_institut').val(Institut.toString());
  }

  //validacions formularis
    delGrup = function(id) {
    $('#grup_id_elim').val(id);
    $("#formularieliminar").attr("action", document.getElementById("formularieliminar").getAttribute("action").replace("idaeliminar", id));

}


  //Validar CIF
  function validarCif() {
    if (this.validity.patternMismatch) {
      this.setCustomValidity('Ha de ser un CIF valid!');
      this.style.boxShadow = "0 0 5px 1px red";
    } else if(this.value === ''){
      this.setCustomValidity('Escriu un CIF!');
      this.style.boxShadow = "0 0 5px 1px red";
    }else{
      this.setCustomValidity('');
      this.style.boxShadow = "none";
    }
  }

  //Validar Telefon
  function validarTel() {
    if (this.validity.patternMismatch) {
      this.setCustomValidity('Ha de ser un telefon correcte!');
      this.style.boxShadow = "0 0 5px 1px red";
    } else if(this.value === ''){
      this.setCustomValidity('Escriu un Telefon!');
      this.style.boxShadow = "0 0 5px 1px red";
    }else{
      this.setCustomValidity('');
      this.style.boxShadow = "none";
    }
  }
  //Validar espais en blanc
  function validarForm() {
    var adr = document.getElementById('adreça');
    if(adr.value === ''){
      adr.setCustomValidity('Escriu una Adreça!');
      adr.style.boxShadow = "0 0 5px 1px red";
    }else{
      adr.setCustomValidity('');
      adr.style.boxShadow = "none";
    }

    var loc = document.getElementById('localitat');

    if(loc.value === ''){
      loc.setCustomValidity('Escriu una Localitat!');
      loc.style.boxShadow = "0 0 5px 1px red";
    }else{
      loc.setCustomValidity('');
      loc.style.boxShadow = "none";
    }

    var nom = document.getElementById('nom');

    if(nom.value === ''){
      nom.setCustomValidity('Escriu un Nom!');
      nom.style.boxShadow = "0 0 5px 1px red";
    }else{
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
