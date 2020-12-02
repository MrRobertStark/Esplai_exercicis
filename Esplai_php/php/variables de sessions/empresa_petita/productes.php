<?php
    session_start(); //Iniciem sessió
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="estils.css" type="text/css"/>
    <style type = "text/css"></style>
    <title>Document</title>

</head>
<body>
    <?php
        //Verifiquem que la sessió estava iniciada prèviament a més a més de la validesa de les dades
        $login_processat = isset($_POST["username"]) && isset($_POST["password"]);
        $sessio_oberta = isset($_SESSION["username"]);

        if($login_processat || $sessio_oberta){
            if($login_processat){
                $user = $_POST["username"];
                $passw = $_POST["password"];
                $_SESSION["username"] = $user;
                $_SESSION["password"] = $passw;
            }
            else{
                $user = $_SESSION["username"];
                $passw = $_SESSION["password"];
            }

            $login_correcte = ($user == "Maria" && $passw == "AS28342W") || (($user == "Joan" || $user == "Pere") && $passw == "ABC");
            if($login_correcte){
    ?>
                <!--Contingut de la pàgina web-->
                <!--Navbar-->
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <a class="navbar-brand" href="#">Navbar</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link disabled" href="#">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="clients.php">Clients</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="comandes.php">Comandes</a>
                            </li>
                        </ul>
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <a href = "login.php" class="btn btn-info my-2 my-sm-0">Log Out</a>
                        </form>
                    </div>
                </nav>
                <!--Fi NavBar-->
                <!--Cos PG-->
                <!--Portada-->
                <h1 class = "mt-4 text-center">Api Punk: web-beersite</h1>

                <!--Capa dels resultats-->
                <div class = "container mt-5">
                    <div class = "row" id = "capa_resultat"></div>
                </div>
                <!--FI capa resultats-->
                <!--Contingut de la pàgina-->
    <?php
            }
            else{
    ?>
                <div class="alert alert-warning alert-dismissible fade show w-50 mx-auto p-5 mt-5 card">
                    <h4 class="alert-heading"><i class="fa fa-warning"></i> Warning!</h4>
                    <p>L'usuari o la contrasenya són incorrectes! Vés a Login i prova-ho un altre cop.</p>
                    <hr>
                    <a href = "login.php" class = "btn btn-info w-50 px-4 d-block mx-auto mt-4">Anar a Login</a>
                </div>
    <?php
            }
        }
        else{
    ?>
                <div class="alert alert-warning alert-dismissible fade show w-50 mx-auto p-5 mt-5 card">
                    <h4 class="alert-heading"><i class="fa fa-warning"></i> Warning!</h4>
                    <p>No s'ha pogut iniciar sessió perquè no existeix cap sessió prèvia. Vés a Login i inicia sessió.</p>
                    <hr>
                    <a href = "login.php" class = "btn btn-info w-50 px-4 d-block mx-auto mt-4">Anar a Login</a>
                </div>
    <?php
        }
    ?>

    <!--JQuery and Bootstrap Bundle (includes Popper)-->
    <script src="http://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script language= "javascript">
        $(document).ready(function(){
            carregar();
            function carregar(){
                $.get("https://api.punkapi.com/v2/beers?&per_page=30&page=1",function(data,status){
                    var beers = data;
                    var beer = "";
                    var i = 0;
                    var etiqueta = "";
                    //Control dels limits
                    if(beers.length > 0){
                        //Bucle per emplenar la capa dels resultats
                        for(i = 0; i < beers.length; i++){
                            beer = beers[i];
                            etiqueta = generacio_cards(beer);
                            $("#capa_resultat").append(etiqueta);
                        }
                    }
                    else {
                        $("#capa_resultat").html("<p>No hi ha resultats</p>");
                    }
                });
            }
            function generacio_cards(beer){
                var id_beer = beer.id;
                var foto_beer = beer.image_url;
                var title_beer = beer.name;
                var tagline = beer.tagline;
                var contribution = beer.contributed_by;
                
                //Tractem les dades
                contribution.replace("<","(");
                contribution.replace(">",")");

                var etiqueta = 
                    "<!--Targeta-->"
                    +"<div class = 'col col-12 col-md-6 col-xl-4'>"
                        +"<div class = 'row card p-4 bg-light' id = '"+id_beer+"'>"
                            +"<div class  = 'col-4'>"
                                +"<img src = '"+foto_beer+"' alt = 'Beer Photo' class = 'foto'>"
                            +"</div>"
                            +"<div class = 'col-8 card-body pt-0'>"
                                +"<h5 class = 'card-title text-center h2'>"+title_beer+"</h5>"
                                +"<h6 class = 'card-subtitle mb-3 text-muted h5 text-center'>"+tagline+"</h6>"
                                +"<p class = 'card-text text-center mt-n2 mt-lg-3'>Contributed by "+contribution+"</p>"
                                +"<input type = 'button' value = 'More info' class = 'btn btn-success container'/>"
                            +"</div>"
                        +"</div>"
                    +"</div>"
                +"<!--FI Targeta-->";

                return etiqueta;
            }
        });
    </script>
</body>
</html>