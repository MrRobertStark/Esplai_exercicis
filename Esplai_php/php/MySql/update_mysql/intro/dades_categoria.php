<!--Connexió amb la base de dades-->
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
        input[type="submit"]{
            font-size:18pt;
        }
        form label{
            margin-top:15px;
        }
    </style>
    <title>Document</title>

</head>
<body class = "p-4">
    <!--header-->
    <div class = "container-fluid fixed-top bg-dark text-white py-4 text-center">
        <h1 class = "my-auto py-3">Update categoria: Correció de dades</h1>
    </div>

    <!--Formulari-->
    <div class = "container-fluid mt-5 pt-5">
    <?php
        if(!$conn->connect_error){
            if(isset($_GET["category"])){
                $categoryid = $_GET["category"];
                $sql = 'SELECT CategoryID, CategoryName, categories.Description FROM categories WHERE CategoryID = "'.$categoryid.'"';
                $categories = $conn->query($sql);
                if($categories->num_rows==1){
                    $categoria = $categories->fetch_assoc();
                    ?>
                        <form action="actualitzar_categoria.php" method="POST" class = "p-4 w-75 mx-auto shadow-lg mt-5 pt-5 text-center">
                            <div class = "form-group">
                                <label for="text_nom_categoria">Nom de la categoria:</label>
                                <input type="text" name = "CategoryNom" id = "text_nom_categoria" class = "form-control w-50 mx-auto" value = "<?php echo $categoria["CategoryName"]?>"/>
                            </div>
                            <div class = "form-group my-4">
                                <label for="text_descripcio">Descripció de la categoria:</label>
                                <textarea name="CategoryDescription" class = "d-block mx-auto p-2" id="text_descripcio" cols="80" rows="5"><?php echo $categoria["Description"]?></textarea>
                            </div>
                            <div class = "form-group">
                                <input type="hidden" name="idCategoria" value = "<?php echo $categoryid?>">
                            </div>
                            <input type="submit" class = "btn btn-primary mx-auto d-block w-50 mt-3 py-3" value = "Actualitzar Categoria">
                        </form>
                    <?php
                }
                elseif($categories->num_rows>1) echo "<p>Categories repetides! Error de base de dades</p>";
                else echo "<p>No existeix la categoria ".$categoryid."</p>";
            }
            else echo "<p>Entra una categoria!</p>";
        }
        else echo "<p>Eror de connexió amb la base de dades</p>";
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