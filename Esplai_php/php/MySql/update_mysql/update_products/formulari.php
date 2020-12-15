<!--Connexió base de dades-->
<?php include("connexio_basedades.php")?>

<!--Pàgina web-->
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
<body class = "p-4">
    <!---header-->
    <div class = "container-fluid fixed-top bg-dark text-white text-center py-3">
        <h1 class = "mb-4">Update products: formulari</h1>
    </div>
    <!--Fi header-->

    <!--Formulari-->
    <div class = "container-fluid mt-5 pt-5">
    <?php
        if(!$conn->connect_error){
        ?>
            <form action="update_product.php" method = "POST" class = "p-5 w-75 mx-auto">
                <div class = "form-row">
                    <div class = "col col-12 col-md-6">
                        <div class = "form-group">
                        <?php
                            $sql = "SELECT * FROM products WHERE ProductID = '5'";
                            $productes = $conn->query($sql);
                            $producte = $productes->fetch_assoc();
                        ?>
                            <label for="text_nom_producte">Nom del producte</label>
                            <input type="text" id = "text_nom_producte" name="NomProducte" class = "form-control" value = "<?php echo $producte["ProductName"]?>">
                        </div>
                    </div>
                    <div class = "col col-12 col-md-6">
                        <div class = "form-group">
                            <label for="select_categoria">Categoria</label>
                            <select id = "select_categoria" name="CategoriaProducte" class = "form-control">
                                <option value="0">Escull una categoria</option>
                            <?php
                                $sql = "SELECT CategoryID, CategoryName FROM categories ORDER BY CategoryName";
                                $categories = $conn->query($sql);
                                while($categoria = $categories->fetch_assoc()){
                                ?>
                                    <option 
                                        value="<?php echo $categoria["CategoryID"]?>" <?php if($categoria["CategoryID"] == $producte["CategoryID"])echo " selected"?>>
                                        <?php echo $categoria["CategoryName"]?>
                                    </option>
                                <?php
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        <?php
        }
        else echo "<p>Hi ha hagut un error connectant amb la base de dades</p>";
    ?>
    </div>
    <!--Fi formulari-->
    

    <!--JQuery and Bootstrap Bundle (includes Popper)-->
    <script src="http://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script language= "javascript">
        $(document).ready(function(){});
    </script>
</body>
</html>