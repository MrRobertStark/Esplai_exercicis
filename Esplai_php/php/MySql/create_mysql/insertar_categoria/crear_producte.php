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
        form label{
            margin-top:15px;
        }
    </style>
    <title>Insertar Categoria</title>

</head>
<body class = "p-4">
    <!--Introducció-->
    <div class = "container mx-auto">
        <h1 class = "text-center">Formulari crear producte</h1>
    </div>

    <?php
        if(!$conn->connect_error){
    ?>
            <form action="crear_producte2.php" method = "POST" class = "p-4 w-75 mx-auto">
                <div class = "form-row">
                    <!--Nom del producte-->
                    <div class = "col col-12 col-md-8">
                        <label for="text_nom_producte">Nom del producte</label>
                        <input type="text" id = "text_nom_producte" class = "form-control" placeholder = "ProductName" name="ProductName">
                    </div>
                    <!--Categoria del producte-->
                    <div class = "col col-12 col-md-4">
                        <?php
                            //Emplenem dinàmicament el select de categories
                            $sql = "SELECT CategoryID, CategoryName FROM categories";
                            $categories = $conn->query($sql);
                            if($categories->num_rows > 0){
                        ?>
                                <label for="select_category">Categoria</label>
                                <select name="ProductCategory" id="select_category" class = "form-control">
                                    <option value="0">Escull una opció</option>
                                <?php
                                    while($categoria = $categories->fetch_assoc()){
                                ?>
                                        <option value="<?php echo $categoria["CategoryID"]?>"><?php echo $categoria["CategoryName"]?></option>
                                <?php
                                    }
                                ?>
                                </select>
                        <?php
                            }
                            else{
                        ?>
                                <input type="hidden" name="ProductCategory" value="0">
                        <?php
                            }
                        ?>
                    </div>
                </div>

                <!--Preu del producte-->
                <div class = "form-group">
                    <label for="number_price">Preu (€)</label>
                    <input type="number" id = "number_price" name="ProductPrice" class = "form-control w-50" min = "0" placeholder = "4,50" step = "any">
                </div>
                <!--Unitats en stock-->
                <div class = "form-group">
                    <label for="number_stock">Units in stock (unitats)</label>
                    <input type="number" id = "number_stock" name="ProductStock" class = "form-control w-50" min = "0" placeholder = "0">
                </div>
                <!--Proveïdor-->
                <div class = "form-group w-50">
                <?php
                    $sql = "SELECT SupplierID, CompanyName FROM suppliers";
                    $proveidors = $conn->query($sql);
                    if($proveidors->num_rows>0){
                        //Emplenem el select dels proveïdors dinàmicament
                    ?>
                        <label for="select_supplier">Proveïdor</label>
                        <select name="ProductSupplier" id="select_supplier" class = "form-control">
                            <option value="0">Escull una opció</option>
                            <?php
                                while($proveidor = $proveidors->fetch_assoc()){
                            ?>
                                    <option value="<?php echo $proveidor["SupplierID"]?>"><?php echo $proveidor["CompanyName"]?></option>
                            <?php
                                }
                            ?>
                        </select>
                    <?php
                    }
                    else echo "No hi ha proveïdors disponibles";
                ?>
                </div>
                <div class = "form-group mt-5">
                    <input type="submit" class = "btn btn-primary d-block mx-auto w-50">
                </div>
            </form>
    <?php
        }
        else{
            echo "Error connectant amb la base de dades";
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