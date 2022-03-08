//Eliminar
$(document).ready(function(){
  $(".papelera").click(function(e){
    e.preventDefault();
    $('#confirm-delete').modal();
    let valors= new Array(6);
    let i = 0
    $(this).parents("tr").find("td").each(function(){
      valors[i] = $(this).html();
      i++;
    });
    $("#eliminarMail").attr('action', 'mail/'+valors[0]);
    $('#idEliminar').val(valors[0]);
  });
});
// //Modal de confirmar l'eliminació
// $('.papelera').click(function (e) {
//   e.preventDefault();
//   $('#confirm-delete').modal();
//   $('#idEliminar').val(valors[0]);
//   return 0;
// });
$(document).ready(function(){
  $("#deleteAll").click(function(e){
    e.preventDefault();
    $('#mdelmail').modal();
    let valors= new Array(6);
    let i = 0
    $(this).parents("tr").find("td").each(function(){
      valors[i] = $(this).html();
      i++;
    });
    $("#eliminarMail").attr('action', 'mail/'+valors[0]);
    $('#idEliminar').val(valors[0]);
  });
});


//Modal de creació
$('#crear').click(function (e) {
  e.preventDefault();
  $('#crearMail').modal();
  return 0;
});

//Eliminar missatge de èxit
$("document").ready(function(){
    setTimeout(function(){
       $("div.alert").remove();
    }, 5000 ); // 5 secs
});

// Mostrar email
$(document).ready(function(){
  $(".veure").click(function(){
  let valores= new Array(7);
  // Obtenemos todos los valores contenidos en los <td> de la fila
  // seleccionada
  let i = 0
  $(this).parents("tr").find("td").each(function(){
    valores[i] = $(this).html();
    i++;
  });
  document.getElementById('destinatari').value = valores[2];
  document.getElementById('asu').value = valores[3];
  document.getElementById('cos').value = valores[4];
  let link = document.getElementById('link_proposta');
  if(valores[5].length > 0){
    link.setAttribute('href',valores[5]);
    link.innerHTML = 'Clica aquí per gestionar la proposta';
  }
});
});

//Mostrar modal per veure l'email
$('.veure').click(function (e) {
  e.preventDefault();
  $('#mostrarMail').modal();
  return 0;
});
