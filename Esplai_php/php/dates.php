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
        .card-title{
            font-size:27pt;
        }
        .card-img-top{
            max-height:350px;
        }
        
    </style>
    <?php $title = "introduccio php" ?>
    <title><?php echo $title;?></title>
</head>

<!--CODI PHP-->
<?php
    $hora = date('H');
    $titol = "";
    $img = "";
    $missatge_motivacional = "";
    $bg = "";

    if($hora > 7 && $hora < 13){
        $titol = "Bona Dia Paio!";
        $img = "imatges/day.jpg";
        $bg = "lightblue";
        $missatge_motivacional = "És hora d'aixecar-se i aprofitar el dia per menjar crispetes, pizzes, programar i dormir encara més! Aprofita cada segon per fer el vago o per treballar! Tens poques hores per aprofitar i moltes coses a fer! Endavant que tu pots!";
    }
    elseif($hora > 12 && $hora <18){
        $titol = "Bona Tarda Usuari!";
        $img = "imatges/tard.jpg";
        $bg = "goldenrod";
        $missatge_motivacional = "És de tarda... Fes la migdiada tota la tarda, els deures i si ets un happy-flower llavors fes una birra.";
    }
    else{
        $titol = "Bona nit Usuari!";
        $img = "imatges/nit.jpg";
        $bg = "darkblue";
        $missatge_motivacional = "S'ha acabat el dia! Ara no toca treballar ni jugar ni menjar. Ara toca posar-se el pijama, programar el despertador i dormir mínim 8 hores per tal d'estar preparat per al dia següent i seguir fent burrades!";
    }
?>

<body class = "p-4" style = "background-color:<?php echo $bg; ?>">
    <div class = "container mx-auto w-50">
        <div class = "card pb-5">
            <img src = "<?php echo $img;?>" class = "card-img-top">
            <div class = "card-body">
                <h4 class = "card-title text-center mb-4"><?php echo $titol;?></h4>
                <p class = "card-text text-justify"><?php echo $missatge_motivacional; ?></p>
            </div>
        </div>
    </div>


    <!--JQuery and Bootstrap Bundle (includes Popper)-->
    <script src="http://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script language= "javascript">
        $(document).ready(function(){});
    </script>
</body>
</html>