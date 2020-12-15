<!--Connexió amb la base de dades-->
<?php include("connexio_basedades.php")?>

<!--Formulari per actualizar la informació bàsica d'un client-->
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
    <!--Header-->
    <div class = "container-fluid py-3 bg-dark text-center text-white fixed-top">
        <h1>Formulari: actualizació dades del client</h1>
    </div>

    <!--Formulari-->
    <div class = "container-fluid mt-5 pt-3">
    <?php
        if(!$conn->connect_error){
            if(isset($_GET["customer"])){
                $sql = "SELECT * FROM customers WHERE CustomerID = '".$_GET['customer']."'";
                $customers = $conn->query($sql);
                if($customers->num_rows>0){
                    $customer = $customers->fetch_assoc();
                ?>
                    <form action="execucio_update.php" method = "POST" class = "p-5 w-75 mx-auto">
                        <div class = "form-row">
                            <!--ID del client-->
                            <input type="hidden" value="<?php echo $_GET["customer"]?>" name = "customerId">
                            <!--Nom del client-->
                            <div class="col col-12 col-md-6">
                                <div class = "form-group">
                                    <label for="nomClient">Nom del client</label>
                                    <input type="text" class = "form-control" id = "nomClient" name = "nomClient" value = "<?php echo $customer["ContactName"]?>"/>
                                </div>
                            </div>
                            <!--Nom de la companyia del client-->
                            <div class="col col-12 col-md-6">
                                <div class = "form-group">
                                    <label for="companyClient">Companyia</label>
                                    <input type="text" class = "form-control" id = "companyClient" name = "companyClient" value = "<?php echo $customer["CompanyName"]?>"/>
                                </div>
                            </div>
                            <!--Títol del client-->
                            <div class="col col-12 col-md-8">
                                <div class = "form-group">
                                    <label for="titolClient">Títol</label>
                                    <input type="text" class = "form-control" id = "titolClient" name = "titolClient" value = "<?php echo $customer["ContactTitle"]?>" >
                                </div>
                            </div>
                            <!--País del client-->
                            <div class="col col-12 col-md-4">
                                <div class = "form-group">
                                <?php
                                    $sql = "SELECT Country FROM customers GROUP BY Country ORDER BY Country";
                                    $countries = $conn->query($sql);
                                    if($countries->num_rows>0){
                                    ?>
                                        <label for="paisClient">País</label>
                                        <select name="paisClient" id="paisClient" class = "form-control">
                                            <option value="0">Escull una opció</option>
                                        <?php
                                            while($country = $countries->fetch_assoc()){
                                            ?>
                                                <option value="<?php echo $country["Country"]?>"
                                                <?php if($customer["Country"] == $country["Country"]) echo " selected"?>
                                                ><?php echo $country["Country"]?></option>
                                            <?php
                                            }
                                        ?>
                                        </select>
                                    <?php
                                    }
                                    else{
                                    ?>
                                        <input type="hidden" value = "0" name="paisClient">
                                    <?php
                                    }
                                ?>
                                    
                                </div>
                            </div>
                            <!--Adreça del client-->
                            <div class="col col-12 col-md-8">
                                <div class = "form-group">
                                    <label for="addressClient">Adreça</label>
                                    <input type="text" id = "addressClient" name = "addressClient" class = "form-control" value = "<?php echo $customer["Address"]?>">
                                </div>
                            </div>
                            <!--Codi Postal-->
                            <div class="col col-12 col-md-4">
                                <div class = "form-group">
                                    <label for="postalClient">Codi Postal</label>
                                    <input type="text" id = "postalClient" name = "postalClient" class = "form-control" value = "<?php echo $customer["PostalCode"]?>">
                                </div>
                            </div>
                            <!--Regió del client-->
                            <div class="col col-12 col-md-6">
                                <div class = "form-group">
                                    <label for="regioClient">Regió</label>
                                    <input type="text" class = "form-control" id = "regioClient" name = "regioClient" value = "<?php echo $customer["Region"]?>"/>
                                </div>
                            </div>
                            <!--Ciutat del client-->
                            <div class="col col-12 col-md-6">
                                <div class = "form-group">
                                    <label for="ciutatClient">Ciutat</label>
                                    <input type="text" class = "form-control" id = "ciutatClient" name = "ciutatClient" value = "<?php echo $customer["City"]?>"/>
                                </div>
                            </div>
                        </div>
                        <!--Telèfon-->
                        <div class = "form-group w-50">
                            <label for="telClient">Telèfon</label>
                            <input type="text" id = "telClient" name = "telClient" class ="form-control" value = "<?php echo $customer["Phone"]?>">
                        </div>
                        <!--Fax-->
                        <div class = "form-group w-50">
                            <label for="faxClient">Fax</label>
                            <input type="text" id = "faxClient" name = "faxClient" class ="form-control" value = "<?php echo $customer["Fax"]?>">
                        </div>
                        <div class = "form-group mt-5">
                            <input type="submit" value = "Actualitzar" class = "btn btn-primary w-50 d-block mx-auto">
                        </div>
                    </form>
                <?php
                }
                else echo "<p>No s'ha trobat el client a modificar</p>";
            }
            else echo "<p>Has d'escollir un client</p>";
        }
        else echo "<p>Error de connexió</p>";
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