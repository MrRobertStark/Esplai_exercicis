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
            box-sizing: border-box;
        }
        body{
            min-width:600px;
        }
        .card-body{
            font-size:14pt;
        }
        .card-img-top{
            max-width:400px;
        }
        hr{
            border-width:1px;
        }
    </style>
    <title>Document</title>

</head>
<body class = "p-4 bg-light">
    <?php
        //Recepció de dades
        $recepcio_correcte = (isset($_POST["nomJugador"])) && (isset($_POST["cognomsJugador"])) && (isset($_POST["casaJugador"])) && (isset($_POST["telJugador"])) && 
                            (isset($_POST["emailJugador"])) && (isset($_POST["ageJugador"])) && (isset($_POST["habilitatJugador"])); //Encara queda la foto
        if($recepcio_correcte){
            //Creació Classe Jugador
        
            class Jugador{
                public $nom;
                public $cognoms;
                public $domicili;
                public $telefon;
                public $email;
                public $edat;
                public $esport;
                public $foto;

                function __construct($nom,$cognoms,$domicili,$telefon,$email,$edat,$esport = 0){
                    $this->nom = $nom;
                    $this->cognoms = $cognoms;
                    $this->domicili = $domicili;
                    $this->telefon = $telefon;
                    $this->email = $email;
                    $this->edat = $edat;
                    $this->esport = $esport;
                }
                
                public function obtenirCategoria(){
                    $rang = "";
                    if($this->edat < 9) $rang = "Pre-Benjamin";
                    elseif($this->edat < 11) $rang = "Benjamin";
                    elseif($this->edat < 13) $rang = "Alevin";
                    elseif($this->edat < 15) $rang = "Infantil";
                    elseif($this->edat < 17) $rang = "Cadet";
                    elseif($this->edat < 19) $rang = "Junior";
                    elseif($this->edat < 24) $rang = "Palista";
                    else $rang = "Senior";
                    
                    return $rang;
                }
            }

            //Array Esports
            $esports = ["Ciclisme","Footing","Bàsquetbol","Futbol","Bàdminton","Tennis","Natació","Hípica","Piragüisime"];

            //Informació bàsica del jugador
            $nomJugador =  $_POST["nomJugador"];
            $cognomsJugador = $_POST["cognomsJugador"];
            $domicili = $_POST["casaJugador"];
            $telefon = $_POST["telJugador"];
            $email = $_POST["emailJugador"];
            $edat = $_POST["ageJugador"];
            $esport = $_POST["habilitatJugador"] - 1;
            $esport = $esports[$esport];

            $player = new Jugador($nomJugador,$cognomsJugador,$domicili,$telefon,$email,$edat,$esport);

    ?>
            <div class = "container mx-auto mt-4" >
                <div class = "card">
                    <!--Header-->
                    <div class = "card-header bg-dark text-white">
                        <h1 class = "text-center">Fitxa tècnica</h1>
                    </div>
                    <!--Informació-->
                    <div class = "card-body p-4">
                        <div class = "row mx-auto">
                            <div class="col col-12 col-md-4 my-auto">
                                <?php
                                    //Foto del jugador
                                    if(move_uploaded_file($_FILES["fotoJugador"]["tmp_name"],"fotoUsuari.jpg")){
                                        $player->foto = "fotoUsuari.jpg";    
                                    }
                                    else $player->foto = "https://cdn4.iconfinder.com/data/icons/political-elections/50/48-512.png";
                                ?>
                                <img src="<?php echo $player->foto?>" alt="fotoUsuari" class = "card-img-top rounded-circle mx-auto d-block">
                            </div>
                            <div class="col col-10 col-md-7 m-5 m-md-0 ml-md-4">
                                <ul class = "list-unstyled">
                                    <li class = "mx-4 my-2">Nom Complet: <?php echo $player->nom?></li>
                                    <hr>
                                    <li class = "mx-4 my-2">Edat: <?php echo $player->edat?></li>
                                    <hr>
                                    <li class = "mx-4 my-2">Domicili: <?php echo $player->domicili?></li>
                                    <hr>
                                    <li class = "mx-4 my-2">Telèfon: <a href="tel:<?php echo $player->telefon?>"><?php echo $player->telefon?></a></li>
                                    <hr>
                                    <li class = "mx-4 my-2">Correu Electrónic: <a href="mailto:<?php echo $player->email?>"><?php echo $player->email?></a></li>
                                    <hr>
                                    <li class = "mx-4 my-2">Esport Principal: <?php echo $player->esport?></li>
                                    <hr>
                                    <li class = "mx-4 my-2">Rang: <?php echo $player->obtenirCategoria()?></li>
                                </ul>
                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php
        }
        else{
    ?>
            <div class="alert alert-warning alert-dismissible fade show p-5 w-50 mx-auto border border-dark mt-5">
                <h4 class="alert-heading mb-4"><i class="fa fa-warning"></i> Warning!</h4>
                <p>No pots visualitzar la informació que conté aquesta pàgina web. Primer t'has de donar d'alta al formulari!</p>
                <hr>
                <p class="mb-0">Per donar-te d'alta prem el següent botó:</p>
                <a href="formulari.html" class = "btn btn-primary my-5 mx-auto d-block w-50">Anar a Formulari</a>
            </div>
    <?php
        }
    ?>

    <!--JQuery and Bootstrap Bundle (includes Popper)-->
    <script src="http://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script language= "javascript">
        $(document).ready(function(){});
    </script>
</body>
</html>