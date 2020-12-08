<!--PHP-->
<?php

    $dia_setmana = date("N");
    $hora = date("H");
    $data = date("j");
    $mes = date("n");

    function botiga_oberta($dia_setmana,$hora,$data,$mes){
        
        //Comprovació del temps
        $es_horari_laboral = (($hora >= 9 && $hora<=13) || ($hora>=16 && $hora<=20));
        $es_dia_laboral = ($dia_setmana < 6);
        $es_festiu = calcular_es_festiu($data,$mes);

        //Comprovació de l'horari laboral de la botiga
        return ($es_dia_laboral && $es_horari_laboral && !$es_festiu);
    }

    function a_punt_de_obrir($dia_setmana,$hora,$data,$mes){
        $resultat = false;
        
        //Comprovació del temps
        $es_horari_laboral = (($hora >= 9 && $hora<=13) || ($hora>=16 && $hora<=20));
        $es_dia_laboral = ($dia_setmana < 6);
        $es_festiu = calcular_es_festiu($data,$mes);

        if ($es_dia_laboral && !$es_horari_laboral && !$es_festiu){
            //Detecció de la primera o segonda ronda
            if($hora < 9) $temps_per_obrir = 9 - $hora;
            elseif($hora < 16) $temps_per_obrir = 16 - $hora;
            //Hores per obrir
            if($temps_per_obrir <= 1) $resultat = true;
        }
        return $resultat;
    }

    function calcular_es_festiu($data,$mes){
        $resultat = false;

        /*Els mesos i dies festius s'han tret a partir de la següent pàgina web:
            https://www.girona-tourist-guide.com/es/acontecimientos/festividades-girona.html
        
            Concepte: Es desa en un array ordenat pels mesos, els dies festius de cadascun.
            Es desen arrays buits (que són mesos sense dies festius) per tal de fer futures manipulacions com ara posar festius nous o 
            personalizatció de l'horari d'una botiga concreta.
        */
        $dates_festius = array(
            array(1,5,6), // Dies festius de gener
            array(), //Dies festius febrer
            array(), //Dies festius març
            array(10,13), //Dies festius abril
            array(1), //Dies festius maig
            array(24), //Dies festius juny
            array(), //Dies festius juliol
            array(15), //Dies festius agost
            array(11), //Dies festius septembre
            array(29), //Dies festius octubre
            array(1), //Dies festius novembre
            array(6,8,25,26) //Dies festius desembre
          );
        
          $resultat = in_array($data,$dates_festius[$mes-1]);

        return $resultat;
    }

    function a_punt_de_tancar($dia_setmana, $hora,$data,$mes){
        $resultat = false;

        if (botiga_oberta($dia_setmana,$hora,$data,$mes)){
            //Detecció de la primera o segonda ronda
            if($hora < 13) $temps_per_tancar = 13 - $hora;
            elseif($hora < 20) $temps_per_tancar = 20 - $hora;
            //Hores per obrir
            if($temps_per_tancar <= 1) $resultat = true;
        }
        return $resultat;
    }

    function calcular_temps_event(){
        //El temps que faltarà per obrir serà 60minus - minuts_actual
        $minuts = date("i");
        return (60 - $minuts);
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
            box-sizing: border-box;
        }
        body{
            min-width: 624px;
        }
        .row{
            width:100%;
        }
        html{
            scroll-behavior: smooth;
        }
        .logo{
            font-size:20pt;
        }
        li.fa{
            font-size:16pt;
        }
        .main_container{
            margin-top:102px;
        }
        .opcions_compra>input{
            font-size:15pt;
        }
        .card-img-top{
            height:190px;
        }
        .contact_information{
            font-size:14pt;
        }
        .contact_information i{
            width:20px;
        }
        #map-container-google-1 iframe{
            width:500px;
            height:500px;
        }
        .destacat h2{
            font-size:50pt;
        }
        .destacat p+p{
            font-size:30pt;
        }
    </style>
    <title>Document</title>

</head>
<body class = "p-4">
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top p-4">
        <a class="navbar-brand" href="#">
            <i class = "fa fa-bolt logo mr-3"></i>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!--Links seccions-->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#main_container">Home <span class="sr-only">(current)</span></a>
                </li>
                <hr class = "w-100 bg-light">
                <li class="nav-item">
                    <a class="nav-link" href="#info_contacte">About</a>
                </li>
                <hr class = "w-100 bg-light">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categories
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#productes_destacats">Abrics Elegants</a>
                    <a class="dropdown-item" href="#productes_destacats">Sabates</a>
                    <a class="dropdown-item" href="#productes_destacats">Bufandes</a>
                    <a class="dropdown-item" href="#productes_destacats">Samarretes</a>
                </li>
                <li class = "nav-item">
                    <a href="#info_contacte" class = "nav-link">Ubicació</a>
                </li>
                <li class = "nav-item">
                    <a href="#info_contacte" class = "nav-link">Contacte</a>
                </li>
            </ul>
            <!--Fi Links seccions-->
            <!--Buscador-->
            <form class="form-inline my-2 my-lg-0">
                <label for="search" class = "btn"><i class = "fa fa-search h3 my-auto text-white"></i></label>
                <input class="form-control mx-4" type="search" placeholder="Search" aria-label="Search" id = "search">
                <button class="btn btn-outline-success my-5 my-md-2 my-sm-0" type="submit">Search</button>
            </form>
            <!--Fi buscador-->
            <ul class = "list-unstyled mr-2 ml-3 my-auto">
                <li class = "btn float-left text-white fa fa-user-o"></li>
                <li class = "btn float-left text-white fa fa-heart-o"></li>
                <li class = "btn float-left text-white fa fa-shopping-cart"></li>
            </ul>
            <!--Fi buscador-->
        </div>
      </nav>
    <!--Fi Navbar-->

    <!--Portada Principal-->
    <a id = "main_container"></a>
    <div class = "main_container container-fluid">
        <div class = "container-fluid row">
            <div class = "col col-12 col-lg-6">
                <img src="https://www.dhresource.com/0x0s/f2-albu-g6-M00-23-F9-rBVaSFuwkPWAHYdtAAVZHnGQuig318.jpg/2018-nuevo-abrigo-de-lana-de-invierno-hombre.jpg" alt="foto_portada" class = "w-100">
            </div>
            <div class = "col col-12 col-lg-6 mt-5">
                <div class = "card px-4 py-5 mx-auto border-0 destacat">
                    <h2 class = "card-title text-center mb-n2">Storm Shop</h2>
                    <div class = "card-body">
                        <p class = "card-subtitle text-center h6 mb-4">Elegant collection</p>
                        <p class = "h3 text-center mt-3">100€ <span class = "ml-3 text-muted h4"><strike>250€</strike></span></p>
                        <div class = "container opcions_compra mt-5 row mx-auto">
                            <div class="col col-6 mx-0">
                                <input type="button" class = "w-100 btn btn-success" value="Pre-Order">
                            </div>
                            <div class="col col-6 mx-0">
                                <input type="button" class = "w-100 btn btn-primary" value="Buy">
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Fi Portada Principal-->
    <a id = "productes_destacats" style = "height:120px;display:block"></a>

    <!--Capa Productes Destacats-->
    <div class = "container-fluid">
        <h2 class = "text-center">Productes destacats</h2>
        <div class = "row p-5">
            <!--Producte 1-->
            <div class = "col col-12 col-md-6 col-lg-4 d-flex align-items-stretch">
                <div class = "card m-4">
                    <img src="https://i.pinimg.com/originals/71/0c/15/710c15b4f8199c7956ee02fcd940cdc2.jpg" alt="turrons1" class = "card-img-top">
                    <div class = "card-body p-4">
                        <h4 class = "card-title text-center">Producte 1</h4>
                        <p class = "card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque alias consectetur ullam ut impedit?<p>
                        <span class = "d-block w-100 text-center my-3 h4">20€</span>
                        <button class = "d-block w-100 text-center my-3 btn btn-success">Buy</button>
                    </div>
                </div>
            </div>
            <!--Producte 2-->
            <div class = "col col-12 col-md-6 col-lg-4 d-flex align-items-stretch">
                <div class = "card m-4">
                    <img src="https://i0.wp.com/www.guiaserviciosproductos.com/wp-content/uploads/2019/12/zapatos-elegantes.jpg?resize=750%2C453&ssl=1" alt="turrons1" class = "card-img-top">
                    <div class = "card-body p-4">
                        <h4 class = "card-title text-center">Producte 2</h4>
                        <p class = "card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque alias consectetur ullam ut impedit?<p>
                        <span class = "d-block w-100 text-center my-3 h4">10€</span>
                        <button class = "d-block w-100 text-center my-3 btn btn-success">Buy</button>
                    </div>
                </div>
            </div>
            <!--Producte 3-->
            <div class = "col col-12 col-md-6 col-lg-4 d-flex align-items-stretch">
                <div class = "card m-4">
                    <img src="https://th.bing.com/th/id/OIP.WNBKtIzNcygxmwV5GRZJdAHaED?pid=Api&rs=1" alt="turrons1" class = "card-img-top">
                    <div class = "card-body p-4">
                        <h4 class = "card-title text-center">Producte 3</h4>
                        <p class = "card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque alias consectetur ullam ut impedit?<p>
                        <span class = "d-block w-100 text-center my-3 h4">30€</span>
                        <button class = "d-block w-100 text-center my-3 btn btn-success">Buy</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Fi Capa Productes Destacats-->
    <!--Informació de contacte-->
    <a id = "info_contacte"></a>
    <div class = "container-fluid">
        <h2 class = "text-center h3 mb-4">Informació de contacte</h2>
        <div class = "row">
            <div class=" col col-12 col-lg-6">
                <div class = "card p-4">
                    <ul class = "list-unstyled contact_information">
                        <li class = "my-4"><i class = "mx-4 fa fa-map-marker"></i>Direcció: <a href="https://maps.google.com/maps?q=manhatan&t=&z=13&ie=UTF8&iwloc=&output=embed">Direcció Botiga</a></li>
                        <li class = "my-4"><i class = "mx-4 fa fa-phone"></i>Telèfon: <a href="tel:555555555">555-555-555</a> </li>
                        <li class = "my-4"><i class = "mx-4 fa fa-clock-o"></i>Horari: 9:00 - 13:00h | 16:00 - 20:00 dies laborals</li>
                        <li class = "my-4">
                            <i class = "mx-4 fa fa-cogs"></i>
                                Status:
                            <?php if(botiga_oberta($dia_setmana,$hora,$data,$mes)){
                            ?>
                                    <span class = "text-success">OBERT</span>
                            <?php
                                }
                                else{
                            ?>
                                    <span class = "text-danger">TANCAT</span>
                            <?php
                                }
                            ?>
                        </li>
                        <?php
                            if(a_punt_de_obrir($dia_setmana,$hora,$data,$mes)){
                                $temps_que_queden = calcular_temps_event();
                        ?>
                                <li class = "my-4">
                                    <i class = "mx-4 fa fa-clock-o"></i>
                                    Queden <span class = "text-success"><?php echo $temps_que_queden?> minuts per apertura</span>
                                </li>
                        <?php
                            }
                            elseif(a_punt_de_tancar($dia_setmana,$hora,$data,$mes)){
                                $temps_que_falten = calcular_temps_event();
                        ?>
                                <li class = "my-4">
                                    <i class = "mx-4 fa fa-clock-o"></i>
                                    Queden <span class = "text-warning"><?php echo $temps_que_falten?> minuts per tancament</span>
                                </li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
            </div>
            <div class=" col col-12 col-lg-6">
                <div class = "card border border-0">
                    <!--Google map-->
                    <div id="map-container-google-1" class="z-depth-1-half map-container mx-auto">
                        <iframe src="https://maps.google.com/maps?q=manhatan&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    <!--Google Maps-->
                </div>
            </div>
        </div>
    </div>
    <!--Fi Informació de contacte-->

    <!--JQuery and Bootstrap Bundle (includes Popper)-->
    <script src="http://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script language= "javascript">
        $(document).ready(function(){});
    </script>
</body>
</html>