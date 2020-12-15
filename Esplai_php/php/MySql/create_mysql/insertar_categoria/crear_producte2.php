<?php
    //Connexió amb la base de dades
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "fundacioesplai_prova0";
    $conn = new mysqli($server,$username,$password,$database);
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
    </style>
    <title>Insertar Categoria</title>

</head>
<body class = "p-4">
    <!--Introducció-->
    <div class = "container mx-auto">
        <h1 class = "text-center">Resultat de la creació del producte</h1>
    </div>

    <div class = "container mx-auto">
        <?php
            if(isset($_POST["ProductName"])){
                //Recollim les dades del formulari
                $nom_producte = $_POST["ProductName"];
                $categoria = $_POST["ProductCategory"];
                $preu = $_POST["ProductPrice"];
                //$preu = (number_format((float)$preu, 2, '.', ''));
                $stock = $_POST["ProductStock"];
                $supplier = $_POST["ProductSupplier"];

                //Preparem la consulta sql
                $sql ='INSERT INTO products (ProductName,CategoryID,UnitPrice,UnitsInStock,SupplierID) VALUES ("'.$nom_producte.'","'.$categoria.'","'.$preu.'","'.$stock.'","'.$supplier.'")';
                if($conn->query($sql)){
                ?>
                    <div class = "card">
                        <div class = "card-body p-4">
                            <h2 class = "h4 card-title">Status: Correcte</h2>
                            <p class = "card-text my-4">El Producte s'ha pujat correctament a la base de dades!</p>
                        </div>
                    </div>
                <?php
                }
                else{
                ?>
                    <div class = "card">
                        <div class = "card-body p-4">
                            <h2 class = "h4 card-title">Status: Error</h2>
                            <p class = "card-text my-4">El Producte NO s'ha pujat correctament a la base de dades! Torna-ho a intentar</p>
                        </div>
                    </div>
                <?php
                }
            }
            else{
                echo "Malament!";
            }
        ?>  
    </div>
    

    
    

    <!--JQuery and Bootstrap Bundle (includes Popper)-->
    <script src="http://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script language= "javascript">
        $(document).ready(function(){});
    </script>
</body>
</html>