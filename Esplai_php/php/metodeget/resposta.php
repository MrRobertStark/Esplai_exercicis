<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style type = "text/css"></style>
    <title>Document</title>

</head>
<body class = "p-4 bg-dark text-white">
    <h1 class = "text-center my-4">Títol principal: Producte detal</h1>
    <?php
        if(isset($_GET["producte"]) && ($_GET["producte"] > 0) && ($_GET["producte"] < 4)){
            $producte = $_GET["producte"];
        }
        else $producte = 0;
        
        $productes = ["defecte.jpg","producte1.jpg","producte2.jpg","producte3.jpg"];
    ?>
    <div class = "card w-50 mx-auto">
        <img src = "<?php echo $productes[$producte]?>" alt = "producte" class = "card-img-top"/>
        <div class = "card-body">
            <h3 class = "card-title text-center text-dark">Producte <?php echo $producte?></h3>
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