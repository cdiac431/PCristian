//JQuery

editarProposta = function(ID_proposta, Categoria, Nom, Descripcio, Requisits, Estimacio, EstatProposta) {
    // $('#cate_id').val(id);
    $('.modal-title').text('Editar Proposta: ' + Nom);
    $('#categoria option[value="' + Categoria + '"]').attr("selected", true);
    $('#proposta_id_editar').val(ID_proposta);
    $('#noM').attr('value', Nom);
    document.getElementById('nom').value = Nom;
    $('#descripciO').attr('value', Descripcio);
    $('#requisitS').val(Requisits);
    $('#estimaciO').val(Estimacio);
    $('#estatPropoS').val(EstatProposta);
    console.log("tio pposa la merda cabro " + Nom);

    // console.log("action", document.getElementById("formularieditar").getAttribute("action").replace("idaeditar", id));
    $("#formularieditarProposta").attr("action", document.getElementById("formularieditarProposta").getAttribute("action").replace("idaeditar", ID_proposta));

    // console.log("funciono");
}
veureProposta = function(id) {
    location.href ="propostes/"+id;
}

eliminarProposta = function(id, Nom) {
    $('#proposta_id_elimin').val(id);
    $('#segur').html("Estàs segur que vols eliminar la proposta -> " + Nom + "?");
    $("#formularieliminar").attr("action", document.getElementById("formularieliminar").getAttribute("action").replace("ideliminar", id));

}
unirseProposta = function(id, Nom) {
    $('#proposta_id_unirse').val(id);
    $('#segurUnirse').html("Estàs segur que vols unir-se la proposta -> " + Nom + "?");
    $("#formulariUnirse").attr("action", document.getElementById("formulariUnirse").getAttribute("action").replace("idUnirse", id));

}

acceptarDeclinar = function(valor){
    $('#botoAcceptar').on('click',function(){
        let $cefaciba = $('#AcceptarDeclinar').val('Acceptar');
        $('#AcceptarDeclinar').val('Acceptar');
        console.log(valor);
    });
    $('#botoDeclinar').on('click',function(){
        $('#AcceptarDeclinar').val('Declinar');
        console.log(valor);
    });
}

//Focus
function focusFuncio(x) {
    x.style.background = "#fafafa"; //potser canviar
}




function treuColor(x) {
    x.style.backgroundColor = "white";
}

function updatePropostes() {
    let peticio = new XMLHttpRequest();
    peticio.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200){
            let propostes = document.getElementById("propostesAjax");
            propostes.innerHTML = $('#propostesAjax').replaceWith($(this.responseText).find('#propostesAjax'));
        }
    }
    
    peticio.open("GET", 'propostes', true);
    peticio.send();

    setTimeout(function() { updatePropostes(); }, 60000);
}
updatePropostes();

$('#formValoracio input').on('click',function(event){
    event.preventDefault();
    let form = this.parentElement.parentElement;
    let data = new FormData(form);
    console.log( );
    $.ajax({
        url: form.action,
        type: "POST",
        data: data,
        processData: false, 
        contentType: false,
        cache : false,
        success:function(data){
           $(formValoracio).hide();
           $(puntuarProposta).hide();
        },
      });
    return false;
});