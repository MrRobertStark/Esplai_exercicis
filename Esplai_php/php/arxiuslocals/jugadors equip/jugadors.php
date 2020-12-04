<?php
    
    if(isset($_GET["erase"])){
        //Esborrem el jugador demanat
        $jugador = $_GET["erase"];

        if($jugador != ""){
            $participants = llegir_jugadors($jugador."\n");
            //Posa al fitxer el nou jugador amb els antics
            desar_resultat($participants);
        }
    }

    //Si es vol integrar un nou jugador a l'equip...
    if(isset($_POST["nomJugador"])){
        $participants = llegir_jugadors(" ");
        desar_resultat($participants,$_POST["nomJugador"]);
    }

    function llegir_jugadors($filtre){
        //Llegeix els jugadors que tenies abans
        $arxiu = fopen("llistatJugadors.txt","r") or die("No s'ha pogut llegir l'arxiu");
        $participants = "";
        while(!feof($arxiu)){
            $jugadorActual = fgets($arxiu);
            if($jugadorActual != "\n" && $jugadorActual != "" && $jugadorActual!=$filtre){
                $participants = $participants.$jugadorActual;
            }
        }
        fclose($arxiu);
        return $participants;
    }

    function desar_resultat($jugadors,$nouJugador="\n"){
        //Posa al fitxer el nou jugador amb els antics
        $jugador = $nouJugador;
        if($jugador != ""){
            $jugadors = ($jugadors.$jugador."\n");
            $arxiu = fopen("llistatJugadors.txt","w") or die();
            fwrite($arxiu,$jugadors);
            fclose($arxiu);
        }
    }
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
    <style type = "text/css">
        *{
            box-sizing:border-box;
        }
        body{
            min-width:525px;
        }
        img.container-fluid{
            filter:brightness(50%);
            height:600px;
        }
        h1{
            position:absolute;
            top:40%;
            width:100%;
            text-align:center;
            font-size:40pt;
            color:white;
        }
        img.rounded-circle{
            max-width:120px;
        }
        @media screen and (max-width:767px){
            .eliminar{
                display:block;
                width:100%;
            }
        }
    </style>
    <title>Document</title>

</head>
<body class = "pb-5">
    <div class = "container-fluid px-0 mb-5">
        <img src = "https://fortwo.es/wp-content/uploads/2019/05/bolera-pedralbes-barcelona.jpg" alt = "img_bolera" class = "d-block container-fluid px-0"/>
        <h1>Llistat de Jugadors Bolera</h1>
    </div>
    <div class ="container-fluid px-0">
        <?php
            $arxiu = fopen("llistatJugadors.txt","r") or die("No s'ha pogut obrir l'arxiu");
            while(filesize("llistatJugadors.txt")!=0 && !feof($arxiu)){
                $nomJugador = fgets($arxiu);
                if($nomJugador!="\n" && $nomJugador!="" && $nomJugador!=" "){
        ?>
            <div class = "container px-4">
                <ul class = "list-unstyled">
                    <li class = "media my-3 row bg-light border border-default p-4" id = "Maria">
                        <div class = "col col-12 col-md-2 media-left align-self-center pb-4 pb-md-0"><img src="https://s-media-cache-ak0.pinimg.com/736x/71/f3/51/71f3519243d136361d81df71724c60a0.jpg" alt="img_client" class = "rounded-circle mx-auto d-block"></div>
                        <div class = "col col-12 col-md-8 media-body ml-5 mt-3 mr-n1 infoUsuari">
                            <h4><?php echo $nomJugador?></h4>
                            <p class = "lema">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis aspernatur cupiditate aut similique nemo mollitia exercitationem ad, veniam, quos!</p>
                        </div>
                        <div class = "col col-12 col-md-2 media-right align-self-center">
                            <button class = "btn btn-outline-primary mt-4 block eliminar">Eliminar</button>
                        </div>
                    </li>
                </ul>
            </div>
        <?php
                }
            }
        ?>
    </div>

    <!--Formulari-->
    <div class = "container mx-auto my-5 px-2">
        <form action="jugadors.php" method = "POST" class = "text-center py-5 bg-dark text-white">
            <h2 class = "mb-5">Afegir Nou Jugador</h2>
            <!--Name-->
            <label for="text_nom" class = "mx-2">Nom del jugador:</label>
            <input type="text" id = "text_nom" name = "nomJugador" placeholder="Nom" class = "mx-2">
            <!--Input descripció-->
            <textarea id="capa_descripcio" cols="50" rows="3" class = "d-block mx-auto my-3" placeholder = "Lema principal del nou jugador"></textarea>
            <!--Submit-->
            <input type="submit" value = "Afegir a l'Equip" class = "btn btn-success mx-auto mt-3">
        </form>
    </div>

    <!--JQuery and Bootstrap Bundle (includes Popper)-->
    <script src="http://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script language= "javascript">
        $(document).ready(function(){
            $(".eliminar").click(function(){
                var jugador = $(this).parent().siblings(".infoUsuari").children("h4").text();
                window.location.href = "jugadors.php?erase="+jugador;
            });
        });
    </script>
</body>
</html>