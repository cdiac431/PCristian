//JQuery
selPressupost = function(Concepte, Preu_unitari, Quantitat, id){
    $('.modal-title2').text('Editar pressupost: '+Concepte);
    $('#nom_cost').val(Concepte);
    $('#preu_cost').val(Preu_unitari);
    $('#quantitat_cost').val(Quantitat);
    $('#id').val(id);
}
delPressupost = function(id){
    $('#id').val(id);
    $("#formeliminar").attr("action", document.getElementById("formeliminar").getAttribute("action").replace("idaeliminar", id));
}

//funcio eliminar
$('#eliminar').click(function () {
    let content = '';
    let i = 0;
    $('input.table-checkbox').each(function (index){
        if ( $(this).prop('checked') ) checkedBoxes.push(index);
        index++;
    });
    for (let i = 0; i<checkedBoxes.length;i++){
        idusereliminat.push(userid[checkedBoxes[i]-1]);
    }
    if (checkedBoxes.length>0){
        $('#deletemodal').modal('toggle');
        idusereliminat.forEach(function (index){
            console.log(index);
            content = content + ("<input type='hidden' name='id"+index+"'"+" value="+"'"+index+"'"+">");
            i++;
        });
        $('#eliminarform').append(content);
    }
});

//confirm password crear form
$('.btn-create').click(function () {
    $('.form-control#password, .form-control#confirm_password').on('keyup',function () {
        if ($('.form-control#password').val() === $('.form-control#confirmpassword').val()) {
            $('.btn.btn-primary#submitCrear').prop('disabled', false);
        } else {
            $('.btn.btn-primary#submitCrear').prop('disabled', true);
        }
    });
});


//Focus
function focusFuncio(x) {
    x.style.background = "#fafafa"; //potser canviar
}

//Blur
function treuColor(x) {
    x.style.backgroundColor = "white";
}
