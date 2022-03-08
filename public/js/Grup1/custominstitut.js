//JQuery

selInstitut = function(id, nom, localitat, direccio, telefon, cif, email){
    $('#ins_id').val(id);
    $('.modal-title2').text('Editar Centre Educatiu: '+nom);
    $('#Nom').val(nom);
    $('#Localitat').val(localitat);
    $('#Direccio').val(direccio);
    $('#Telefon').val(telefon);
    $('#CIF').val(cif);
    $('#Email').val(email);
  }

  delInstitut = function(id) {
    $('#institut_id_elim').val(id);

    $("#formularieliminar").attr("action", document.getElementById("formularieliminar").getAttribute("action").replace("idaeliminar", id));

}
  //Modal per a recollir dades camp sol·licitud
  reviewInstitut = function(id, nom, localitat, direccio, telefon, cif, email, ruta_document){
    $('#centre_id').val(id);
    $('#Nom_centre').val(nom);
    $('.modal-title3').text('Sol·licitud del centre '+nom);
    $('#Localitat_centre').val(localitat);
    $('#Direccio_centre').val(direccio);
    $('#Telefon_centre').val(telefon);
    $('#CIF_centre').val(cif);
    $('#Email_centre').val(email);
    $('#Fitxer_centre').val(ruta_document);
    $('#Fitxer').attr('href', '/reviewdocumentation/' + ruta_document);
    console.log(ruta_document);
  }

  //Modal per a confirmar sol·licitud
  reviewInstitut2 = function(centre_id, Nom_centre){
    $('#id_centre').val($('#centre_id').val());
    $('#centre_nom').val($('#Nom_centre').val());
    $('#centre_email').val($('#Email_centre').val());
  }

  //Modal per a denegar sol·licitud
  reviewInstitut3 = function(centre_id, Nom_centre){
    $('#centr_id').val($('#centre_id').val());
    $('#centr_nom').val($('#Nom_centre').val());
    $('#centr_email').val($('#Email_centre').val());
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
