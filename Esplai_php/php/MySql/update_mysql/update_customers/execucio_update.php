<!--Connexió amb la base de dades-->
<?php include("connexio_basedades.php")?>

<!--Pàgina actualització de la informació del client-->
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
        body{
            min-width:400px;
        }
        .alert{
            min-width:300px;
            max-width:700px;
        }
    </style>
    <title>Document</title>

</head>
<body>
    <!--Header-->
    <div class = "container-fluid bg-dark text-white text-center py-4">
        <h1>Actualització customer</h1>
    </div>
    
    <!--Execució de l'actualizació-->
    <div class = "container-fluid">
    <?php
        if(isset($_POST["customerId"])){
            //Recepció de les dades
            $id = $_POST["customerId"];
            $nom = $_POST["nomClient"];
            $company = $_POST["companyClient"];
            $titol = $_POST["titolClient"];
            $pais = $_POST["paisClient"];
            $regio = $_POST["regioClient"];
            $ciutat = $_POST["ciutatClient"];
            $tel = $_POST["telClient"];
            $fax = $_POST["faxClient"];
            $address = $_POST["addressClient"];
            $postal = $_POST["postalClient"];

            //Execució de la query
            $sql = "UPDATE customers SET CompanyName = '".$company."', ContactName = '".$nom."', ContactTitle = '".$titol."', customers.Address = '".$address."', PostalCode = '".$postal."' , City = '".$pais."', Region = '".$regio."', Country = '".$pais."', Phone = '".$tel."', Fax = '".$fax."' WHERE CustomerID = '".$id."'";
            if($conn->query($sql)){
            ?>
                <div class = "alert alert-success p-4 mx-auto mt-5 pt-5">
                    <h2 class = "alert-heading text-center mb-4">Actualizació Correcte</h2>
                    <p>Les dades del client <b><?php echo $nom?></b> s'han actualitzat correctament segons el formulari emplenat!</p>
                    <hr>
                    <p class = "mb-5">En cas de voler modificar o gestionar més clients clica el següent botó:</p>
                    <a href="mostrar_clients.php" class = "d-block w-50 mx-auto py-2 btn btn-primary my-4">Veure clients</a>
                </div>
            <?php
            }
            else{
            ?>
                <div class = "alert alert-warning p-4 mx-auto mt-5 pt-5">
                    <h2 class = "alert-heading text-center mb-4">Error d'actualització</h2>
                    <p>No s'han pogut actualizat correctament les dades del client <b><?php echo $nom?></b> a causa d'un error inesperat. Torna a intentar-ho.</p>
                    <hr>
                    <p class = "mb-5">Per tornar a intentar-ho clica el següent botó:</p>
                    <a href="mostrar_clients.php" class = "d-block w-50 mx-auto py-2 btn btn-primary my-4">Veure clients</a>
                </div>
            <?php 
            }
        }
        else{
        ?>
            <div class = "alert alert-warning p-4 mx-auto mt-5 pt-5">
                <h2 class = "alert-heading text-center mb-4">Error d'identificació</h2>
                <p>No s'ha trobat el identificador del client per actualitzar les seves dades. Vés a veure els clients disponibles i gestiona la seva informació.</p>
                <hr>
                <p class = "mb-5">Per tornar a intentar-ho clica el següent botó:</p>
                <a href="mostrar_clients.php" class = "d-block w-50 mx-auto py-2 btn btn-primary my-4">Veure clients</a>
            </div>
        <?php
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