document.getElementById("file").addEventListener('change', cambiarImagen);

    function cambiarImagen(event){
        var file = event.target.files[0];

        var reader = new FileReader();
        reader.onload = (event) => {
            document.getElementById("picture").setAttribute('src', event.target.result);
        };

        reader.readAsDataURL(file);
    }



    //Ha de poder modificar camps, mostrar els camps contrasenya i dni
    //Mostrar botó guardar i cancel·lar
    var btn_1 = document.getElementById('btn_1');
    var btn_2 = document.getElementById('btn_2');
    var btn_3 = document.getElementById('btn_3');
    var dnihidden = document.getElementById('divdni');
    var passwordhidden = document.getElementById('divpassword');
    var passwordhidden2 = document.getElementById('divpassword2');

    document.getElementById("btn_1").addEventListener('click', defusereadonly);
    
    function defusereadonly(){


        document.getElementById("user_name").readOnly = false;
        document.getElementById("nom").readOnly = false;
        document.getElementById("cognom").readOnly = false;
        document.getElementById("segon_cognom").readOnly = false;
        document.getElementById("telefon").readOnly = false;
        document.getElementById("email").readOnly = false;
        document.getElementById("data_naixement").readOnly = false;

        dnihidden.style.display = 'inline';
        passwordhidden.style.display = 'inline';
        passwordhidden2.style.display = 'inline';
        btn_1.style.display = 'none';
        btn_2.style.display = 'inline';
        btn_3.style.display = 'inline';


    }

    document.getElementById("btn_3").addEventListener('click', returnonly);


    function returnonly(){

        document.getElementById("user_name").readOnly = true;
        document.getElementById("nom").readOnly = true;
        document.getElementById("cognom").readOnly = true;
        document.getElementById("segon_cognom").readOnly = true;
        document.getElementById("telefon").readOnly = true;
        document.getElementById("email").readOnly = true;
        document.getElementById("data_naixement").readOnly = true;


        dnihidden.style.display = 'none';
        passwordhidden.style.display = 'none';
        passwordhidden2.style.display = 'none';

        btn_1.style.display = 'inline';
        btn_2.style.display = 'none';
        btn_3.style.display = 'none';
    }
