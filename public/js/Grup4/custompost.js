//JQuery

function editPost(id, titol, entradeta, contingut, ruta_blog) {
    let form = $("#formularieditar");
    form.find("[name = 'titol']").val(titol);
    form.find("[name = 'entradeta']").val(entradeta);
    form.find("[name = 'contingute']").val(contingut);
/*     form.find("[name = 'contingutee']").val(contingut);
 */    form.find("[name = 'ruta_blog']").val(ruta_blog);
    form.find("[name = 'id']").val(id);


    /* $.ajax({
        data: id,
        type: "POST",
        dataType: "json",
        url: "blogs.getdata",
        success: function(data){
            console.log(data);
        },
        error: function(error){
            console.error(error);
        }
    } */


}



// post_id_elim
elimPost = function(id, titol) {
    $('#post_id_elimin').val(titol);
    $('#segur').html("Estàs segur que vols eliminar el post de " + titol + "?");
    $("#formularieliminar").attr("action", document.getElementById("formularieliminar").getAttribute("action").replace("ideliminar", id));

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
