//const { forEach } = require("lodash"); //

//Empresa

var maxE = document.getElementsByClassName('nomE');

//Arrays

var nomE =[];
var latE =[];
var lonE =[];

//Agafem dades

for (let i = 0; i < maxE.length; i++) {
        nomE.push(document.getElementsByClassName('nomE')[i].innerHTML);
        latE.push(document.getElementsByClassName('latE')[i].innerHTML);
        lonE.push(document.getElementsByClassName('lonE')[i].innerHTML);
}
//Instituts

var maxI = document.getElementsByClassName('nomI');

//Arrays

var nomI =[];
var latI =[];
var lonI =[];

//Agafem dades

for (let i = 0; i < maxI.length; i++) {
    nomI.push(document.getElementsByClassName('nomI')[i].innerHTML);
    latI.push(document.getElementsByClassName('latI')[i].innerHTML);
    lonI.push(document.getElementsByClassName('lonI')[i].innerHTML);
}

function initMap(){

    //Opcions del mapa
    
    var options = {
        //center: {lat: 40.8124900 , lng:0.5216000 }, //MONTSIA
        center: {lat: 41.596870567642554 , lng:1.5009140575004853 }, //per ai per catalunya
        zoom: 8,
        mapTypeId: 'roadmap'
        //mapTypeId: satellite
    }

    //Creem objecte mapa amb les opcions al element "map"

    map = new google.maps.Map(document.getElementById("map"),options)


    //Imatges

    var imgInstitut = "/img/institutt.png";
    var imgEmpresa = "/img/empresaa.png";
  
    //Array dels marcs

    let MarkerArray=[];

    //bucle que pasa per totes les dades Empresa

    for (i = 0; i < maxE.length; i++) {

        MarkerArray.push(
            {location:{lat: +latE[i], lng: +lonE[i]},imageIcon: imgEmpresa,content: `<h5>`+nomE[i]+`</h5>`}
        );
       
        
    }

    //bucle que pasa per totes les dades Institut

    for (i = 0; i < maxI.length; i++) {

        MarkerArray.push(
            {location:{lat: +latI[i], lng: +lonI[i]},imageIcon: imgInstitut,content: `<h5>`+nomI[i]+`</h5>`}
        );
       
        
    }

    //Afegir els punts

    for (let i = 0; i < MarkerArray.length; i++){
        addMarker(MarkerArray[i]);

    }

    //Metode per crear el marc 

    function addMarker(property){

        const marker = new google.maps.Marker({
            position:property.location,
            map:map,
        });
        if(property.imageIcon){
            marker.setIcon(property.imageIcon)
        }
        if(property.content){
            const detailWindow = new google.maps.InfoWindow({
                content: property.content
            });
            marker.addListener("click", () =>{
                detailWindow.open(map, marker);
            })
        }
    }
}
