//JQuery

selEmpresa = function(id, Nom, Localitat, Direccio, Telefon, CIF, Email){
    $('#em_id').val(id);
    $('.modal-title2').text('Editar entitat: '+Nom);
    $('#Nom').val(Nom);
    $('#Localitat').val(Localitat);
    $('#Direccio').val(Direccio);
    $('#Telefon').val(Telefon);
    $('#CIF').val(CIF);
    $('#Email').val(Email);
  }

  delEmpresa = function(id) {
    $('#empresa_id_elim').val(id);
    $("#formularieliminar").attr("action", document.getElementById("formularieliminar").getAttribute("action").replace("idaeleiminar", id));

}

empresesPendents = function(id, nom, localitat, direccio, telefon, cif, email, ruta_document){
  $('#entitat_id').val(id);
  $('#Nom_entitat').val(nom);
  $('.modal-title3').text('Sol·licitud de la entitat '+nom);
  $('#Localitat_entitat').val(localitat);
  $('#Direccio_entitat').val(direccio);
  $('#Telefon_entitat').val(telefon);
  $('#CIF_entitat').val(cif);
  $('#Email_entitat').val(email);
  $('#Fitxer_entitat').val(ruta_document);
    $('#Fitxer').attr('href', '/reviewdocumentation/' + ruta_document);
    console.log(ruta_document);
}

empresesPendents2 = function(entitat_id, Nom_entitat){
  $('#id_entitat').val($('#entitat_id').val());
  $('#entitat_nom').val($('#Nom_entitat').val());
  $('#entitat_email').val($('#Email_entitat').val());
}

empresesPendents3 = function(entitat_id, Nom_entitat){
  $('#enti_id').val($('#entitat_id').val());
  $('#enti_nom').val($('#Nom_entitat').val());
  $('#enti_email').val($('#Email_entitat').val());
}

  //validacions formularis

  window.onload = function() {
    var cif = document.getElementById('Cif');
    cif.oninput = validarCif;

    var tel = document.getElementById('tel');
    tel.oninput = validarTel;
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
    var adr = document.getElementById('direccio');
    if(adr.value === ''){
      adr.setCustomValidity('Escriu una direccio!');
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
