<!--Connexió a la base de dades-->
<?php include("connexio_basedades.php")?>

<!--Plana web-->
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
        .alert{
            min-width:420px;
        }
    </style>
    <title>Document</title>

</head>
<body class = "p-4">
    <!--Header-->
    <div class = "fixed-top bg-dark text-white text-center p-4">
        <h1 class = "mb-4">Update Categoria: Resultat</h1>
    </div>
    <!--Resultat-->
    <div class = "mt-5 pt-5">
    <?php
        if(isset($_POST["idCategoria"])){
            $sql = "UPDATE categories SET CategoryName = '".$_POST['CategoryNom']."', categories.Description = '".$_POST['CategoryDescription']."' WHERE CategoryID = '".$_POST['idCategoria']."'";
            if($conn->query($sql)){
            ?>
                <div class = "alert alert-success d-block w-50 mx-auto mt-5 p-5 shadow-sm">
                    <h4 class = "alert-heading">Categoria actualitzada correctament</h4>
                    <p>La categoria seleccionada (<?php echo $_POST["CategoryNom"]?>) ha sigut correctament seleccionada juntament amb la seva descripció.</p>
                    <hr>
                    <p>Vols modificar un altre categoria? Mira les categories que pots actualitzar i gestiona-les al teu gust!</p>
                    <a href="llistat_categories.php" class = "btn btn-primary mx-auto w-75 py-3 d-block">Veure categories disponibles</a>
                </div>
            <?php
            }
            else{
            ?>
                <div class = "alert alert-warning d-block w-50 mx-auto mt-5 p-5 shadow-sm">
                    <h4 class = "alert-heading">Error: No s'ha pogut actualitzar la categoria</h4>
                    <p>La categoria de la base de dades a actualitzar no s'ha actualitzat correctament per un error de dades. Torna a emplenar el <a href="dades_categoria.php?category=<?php echo $_POST["idCategoria"]?>">formulari</a> o escull un altre categoria.</p>
                    <hr>
                    <a href="llistat_categories.php" class = "btn btn-primary py-3 d-block mx-auto w-50">Categories</a>
                </div>
            <?php
            }
        }
        else{
        ?>
            <div class = "alert alert-warning d-block w-50 mx-auto mt-5 p-5 shadow-sm">
                <h4 class = "alert-heading">No s'ha trobat categoria a actualitzar</h4>
                <p>La categoria de la base de dades a actualitzar no s'ha trobat. Per actualitzar un producte has d'escollir una <a href="llistat_categories.php">categoria</a> i emplenar un formulari.</p>
                <hr>
                <p>Per veure les categories que pots manipular clica el següent botó:</p>
                <a href="llistat_categories.php" class = "btn btn-primary py-3 d-block mx-auto w-50">Categories</a>
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