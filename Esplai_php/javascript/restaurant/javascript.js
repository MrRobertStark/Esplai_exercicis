
//Variables globals
var plats = [["img/pasta.jpg",10],["img/pasta.jpg",20],["img/pasta.jpg",30],["img/pasta.jpg",40],["img/pasta.jpg",50],["img/pasta.jpg",60],["img/pasta.jpg",70],["img/pasta.jpg",80],["img/pasta.jpg",90]];

//La següent funció mostra una foto del plat seleccionat de la barra lateral
function show_dish(dish){
    //Ajustem CSS del llistat
    var llistat_plats = document.getElementsByTagName("a");
    var i = 0;
    for(i = 0; i < llistat_plats.length; i++){
        llistat_plats[i].style.backgroundColor = "#414956";
    }
    llistat_plats[dish].style.backgroundColor = "#2e333b";

    //Posem la foto
    document.getElementById("foto_producte").src = plats[dish][0];
    document.getElementById("preu_producte").innerHTML = "$"+plats[dish][1];
    document.getElementById("titol_producte").innerHTML = llistat_plats[dish].text;
}

//La següent funció ordena el producte demanat a l'empresari
function order_product(){
    window.alert("A causa de la situació actual, aquest servei no és disponible. Demani la seva comanda per domicili. Gràcies")
}

//La següent funció demana la seva comanda ser enviada per domicili
function send_product(){
    window.alert("La seva comanda serà entregada a la seva casa en breu! Gràcies per la seva compra")
}