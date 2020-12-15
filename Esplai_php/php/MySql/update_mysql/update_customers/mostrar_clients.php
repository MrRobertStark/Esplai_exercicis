<!--Connexió amb la base de dades i funcions generals-->
<?php 
    include("connexio_basedades.php");

    function correcio_dada($dada){
    //La funció retorna un caràcter especial en cas que $dada sigui un string buit
        $resultat = "";
        if($dada == "")$resultat = "-";
        else $resultat = $dada;

        return $resultat;
    }
?>

<!--Llistat dels clients-->
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
        th{
            width:7%;
        }
        tr:nth-child(even){
            background-color: #f7f7f7;
        }
        thead{
            z-index:2;
        }
        tbody{
            z-index:1;
        }
    </style>
    <title>Document</title>

</head>
<body class = "">
    <!--Header-->
    <div class = "container-fluid py-3 bg-dark text-white text-center">
        <h1>Llistat de clients</h1>
    </div>

    <!--Contingut-->
    <div class = "container-fluid mt-5 px-0">
    <?php
        if(!$conn->connect_error){
            if(isset($_GET["customer"])) $nomClient = $_GET["customer"];
            else $nomClient = "";

            if(isset($_GET["pais"])) $pais = $_GET["pais"];
            else $pais = "";
        ?>
            <!--Formulari per filtrar els customers-->
            <form action="mostrar_clients.php" method = "GET" class = "w-75 mx-auto">
                <h2 class = "text-center h3">Filtre <span class = "fa fa-filter"></span></h2>
                <!--Nom del client-->
                <div class="form-group">
                    <label for="nomClient">Nom del client</label>
                    <input type="text" id = "nomClient" name = "customer" class = "form-control" value = "<?php echo $nomClient?>">
                </div>
                <!--País del client-->
                <div class="form-group">
                    <label for="paisClients">País del client</label>
                    <select type="text" id = "paisClients" name = "pais" class = "form-control">
                        <option value="">Tots els països</option>
                    <?php
                        $sql = "SELECT Country FROM customers GROUP BY Country ORDER BY Country";
                        $countries = $conn->query($sql);
                        while($country = $countries->fetch_assoc()){
                        ?>
                            <option value="<?php echo $country["Country"]?>" <?php if($country["Country"] == $pais) echo " selected"?>> <!--Select automàtic del país-->
                                <?php echo $country["Country"]?> <!--Nom del país-->
                            </option>
                        <?php
                        }
                    ?>
                    </select>
                </div>
                <div class = "form-group">
                    <input type="submit" value = "Buscar" class = "btn btn-primary mx-auto mt-5 d-block w-50">
                </div>
            </form>
            <!--Fi formulari-->

            <!--Resultat de la cerca-->
            <div class = "container-fluid px-0 mt-5">
            <?php
                if($nomClient=="")$nomClient = "_";
                if($pais=="") $pais = "_";
                $sql = "SELECT * FROM customers WHERE ContactName LIKE '%".$nomClient."%' AND Country LIKE '%".$pais."%'";
                $customers = $conn->query($sql);
                if($customers->num_rows>0){
                ?>
                    <table class = "d-block mx-auto mb-5 p-0 text-center">
                        <!--table header-->
                        <thead>
                            <th class = "bg-dark text-white py-3 px-1 position-sticky sticky-top">ID</th>
                            <th class = "bg-dark text-white py-3 px-1 position-sticky sticky-top">Companyia</th>
                            <th class = "bg-dark text-white py-3 px-1 position-sticky sticky-top">Nom client</th>
                            <th class = "bg-dark text-white py-3 px-1 position-sticky sticky-top">Títol</th>
                            <th class = "bg-dark text-white py-3 px-1 position-sticky sticky-top">Adreça</th>
                            <th class = "bg-dark text-white py-3 px-1 position-sticky sticky-top">Ciutat</th>
                            <th class = "bg-dark text-white py-3 px-1 position-sticky sticky-top">Regió</th>
                            <th class = "bg-dark text-white py-3 px-1 position-sticky sticky-top">Codi Postal</th>
                            <th class = "bg-dark text-white py-3 px-1 position-sticky sticky-top">País</th>
                            <th class = "bg-dark text-white py-3 px-1 position-sticky sticky-top">Telèfon</th>
                            <th class = "bg-dark text-white py-3 px-1 position-sticky sticky-top">Fax</th>
                            <th class = "bg-dark text-white py-3 px-1 position-sticky sticky-top">Editar</th>
                            <th class = "bg-dark text-white py-3 px-1 position-sticky sticky-top">Comandes</th>
                            <th class = "bg-dark text-white py-3 px-1 position-sticky sticky-top">El·liminar</th>
                        </thead>
                        <!--Fi table header-->

                        <!--Cos de la taula-->
                        <tbody>
                        <?php
                            while($customer = $customers->fetch_assoc()){
                            ?>
                                <tr>
                                    <td class = "p-1 py-2 bg-dark text-white"><?php echo $customer["CustomerID"] ?></td>
                                    <td class = "p-1"><?php echo $customer["CompanyName"] ?></td>
                                    <td class = "p-1"><?php echo correcio_dada($customer["ContactName"]) ?></td>
                                    <td class = "p-1"><?php echo correcio_dada($customer["ContactTitle"]) ?></td>
                                    <td class = "p-1"><?php echo correcio_dada($customer["Address"]) ?></td>
                                    <td class = "p-1"><?php echo correcio_dada($customer["City"]) ?></td>
                                    <td class = "p-1"><?php echo correcio_dada($customer["Region"]) ?></td>
                                    <td class = "p-1"><?php echo correcio_dada($customer["PostalCode"]) ?></td>
                                    <td class = "p-1"><?php echo correcio_dada($customer["Country"]) ?></td>
                                    <td class = "p-1"><?php echo correcio_dada($customer["Phone"]) ?></td>
                                    <td class = "p-1"><?php echo correcio_dada($customer["Fax"]) ?></td>
                                    <td class = "p-1"><a href="formulari.php?customer=<?php echo $customer["CustomerID"]?>" class = "text-dark"><i class = "fa fa-pencil"></i></a></td>
                                    <td class = "p-1"><a href="#!" class = "text-dark"><i class = "fa fa-book"></i></a></td>
                                    <td class = "p-1"><a href="#!" class = "text-dark"><i class = "fa fa-times"></i></a></td>
                                </tr>
                            <?php
                            }
                        ?>
                        </tbody>
                        <!--Fi del cos de la taula-->
                    </table>
                <?php
                }
                else echo "<p>No s'han trobat resultats que coincideixin amb el filtre</p>";
            ?>
            </div>
            <!--Fi resultat de la cerca-->
        <?php
        }
        else echo "<p>Error de connexió amb la base de dades</p>";
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