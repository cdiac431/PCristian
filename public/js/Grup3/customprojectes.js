//JQuery

selProjecte = function(nom_projecte, data_inici, data_final, id){
  $('.modal-title2').text('Editar projecte: '+ nom_projecte);
  $('#nom_projecte_update').val(nom_projecte);
  var i = new Date(data_inici); 
  var f = new Date(data_final); 
  var data_i = formatDate(i); 
  var data_f = formatDate(f); 


  function formatDate(date) { 
      var day = date.getDate(); 
      if (day < 10) { 
          day = "0" + day; 
      } 
      var month = date.getMonth() + 1; 
      if (month < 10) { 
          month = "0" + month; 
      } 
      var year = date.getFullYear(); 
      return year + "-" + month + "-" + day; 
  } 

  $('#Datai').val(data_i);
  $('#Dataf').val(data_f);
  $('#id_projecte').val(id);

  console.log(id_projecte);
}

veureprojecte = function(nom, Descripcio, DataInici) {
  $('.modal-title').html('Projecte : ' + nom);
  $('#Descripcio').html(Descripcio);
  $('#dataInici').html(DataInici);

}

showPressupost = function(Nom, Preu, Quantitat) {
  $('.modal-title').text("Pressupost : " + Nom);
  $('#Nom').html(Nom);
  $('#Preu').html(Preu);
  $('#Quantitat').html(Quantitat);
}



delProjecte = function(id){
    $('#id_projecte').val(id);
    console.log('Vols borrar el projecte' + id);
    $("#formeliminar").attr("action", document.getElementById("formeliminar").getAttribute("action").replace("idaeliminar", id));
}

//validacions formularis

//Validar espais en blanc
function validarForm() {
  var nom = document.getElementById('nom_projecte');

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