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
            $nomComplet = $_POST["nomJugador"]." ".$_POST["cognomsJugador"];
            $domicili = $_POST["casaJugador"];
            $telefon = $_POST["telJugador"];
            $email = $_POST["emailJugador"];
            $edat = $_POST["ageJugador"];
            $esport = $_POST["habilitatJugador"];
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
                                <img src="https://th.bing.com/th/id/OIP.81fadf1Wi0xhIK0VIkY-JAHaHa?pid=Api&rs=1" alt="fotoUsuari" class = "card-img-top rounded-circle mx-auto d-block">
                            </div>
                            <div class="col col-10 col-md-7 m-5 m-md-0 ml-md-4">
                                <ul class = "list-unstyled">
                                    <li class = "mx-4 my-2">Nom Complet: <span><?php echo $nomComplet?></span></li>
                                    <hr>
                                    <li class = "mx-4 my-2">Edat: <span><?php echo $edat?></span></li>
                                    <hr>
                                    <li class = "mx-4 my-2">Domicili: <span><?php echo $domicili?></span></li>
                                    <hr>
                                    <li class = "mx-4 my-2">Telèfon: <span><?php echo $telefon?></span></li>
                                    <hr>
                                    <li class = "mx-4 my-2">Correu Electrónic: <span><?php echo $email?></span></li>
                                    <hr>
                                    <li class = "mx-4 my-2">Esport Principal: <span><?php echo $esport?></span></li>
                                    <hr>
                                    <li class = "mx-4 my-2">Rang: <span>Master Chief</span></li>
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