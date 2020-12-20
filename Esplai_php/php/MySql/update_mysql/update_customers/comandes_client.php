<!--Connexió amb la base de dades-->
<?php include("connexio_basedades.php")?>

<!---Comandes del client-->
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
        body{
            min-width:350px;
        }
        th{
            width:18%;
        }
        .card-header img{
            min-width:180px;
        }
        @media screen and (min-width:768px){
            .container-foto{
                background-color:#007bff;
            }
        }
        @media screen and (max-width:768px){
            .contenidor_taula{
                overflow-x:scroll;
                padding:0em!important;
            }
            .card{
                width:100%!important;
            }
        }
    </style>
    <title>Document</title>

</head>
<body>
    <!--Header-->
    <div class = "container-fluid px-0 py-4 bg-dark text-white text-center">
        <h1 class = "my-auto">Comandes del client</h1>
    </div>

    <!--Link de navegació-->
    <div class = "container-fluid px-3 my-3">
        <a href="mostrar_clients.php">Mostrar customers > </a>
        <a href="comandes_client.php">Comandes clients</a>
    </div>

    <!--Contingut de la pàgina web-->
    <div class = "container-fluid px-0 mb-5">
    <?php
        if($servidor_connectat){
            if(isset($_GET["customer"])){
                //Si el servidor funciona i tenim seleccionat un customer podem fer el llistat de les comandes
                $query_comandes = "SELECT OrderID, FirstName, LastName, OrderDate, CompanyName, ShipCountry FROM orders INNER JOIN shippers ON shippers.ShipperID = orders.ShipVia INNER JOIN employees ON employees.EmployeeID = orders.EmployeeID WHERE CustomerID = '".$_GET["customer"]."'";
                $comandes = $conn->query($query_comandes);
                $query_customer = "SELECT CustomerID, ContactName, ContactTitle, CompanyName, Phone FROM customers WHERE CustomerID = '".$_GET["customer"]."'";
                $info_customer = $conn->query($query_customer);
                $customer = $info_customer->fetch_assoc();
                
                if($comandes->num_rows>0){
                ?>

                    <div class = "row w-100 mx-auto px-0">
                        <div class="col col-12">
                        <h2 class = "text-center mb-n3 mt-3">Client</h2>
                            <div class = "card m-5 shadow-lg w-75 mx-auto">
                                <div class = "row">
                                    <div class="col col-12 col-md-6 d-flex align-items-stretch container-foto">
                                        <!--Foto del customer-->
                                        <div class = "card-header my-auto bg-primary border border-primary">
                                            <img src="https://png.pngtree.com/png-clipart/20190516/original/pngtree-users-vector-icon-png-image_3725294.jpg" alt="" class = " card-img-top w-50 d-block mx-auto rounded-circle">
                                        </div>
                                    </div>
                                    <div class="col col-12 col-md-6 d-flex align-items-stretch">
                                        <!--Informació bàsica del customer-->
                                        <div class = "card-body p-5 bg-white">
                                            <h2 class = "card-title h3 text-center"><?php echo $customer["ContactName"]?></h2>
                                            <h3 class = "card-subtitle h4 text-center text-muted mb-4"><?php echo $customer["ContactTitle"] ?></h3>
                                            <p class = "card-text text-center">
                                                <b>CompanyName: </b><br><?php echo $customer["CompanyName"] ?>
                                            </p>
                                            <p class = "card-text text-center">
                                                <b>Phone: </b><br><?php echo $customer["Phone"]?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col col-12 contenidor_taula">
                            <table class = "mx-auto">
                                <thead>
                                    <th class = "bg-dark text-white text-center p-3 position-sticky sticky-top">OrderID</th>
                                    <th class = "bg-dark text-white text-center p-3 position-sticky sticky-top">Employee</th>
                                    <th class = "bg-dark text-white text-center p-3 position-sticky sticky-top">OrderDate</th>
                                    <th class = "bg-dark text-white text-center p-3 position-sticky sticky-top">CompanyName</th>
                                    <th class = "bg-dark text-white text-center p-3 position-sticky sticky-top">ShipCountry</th>
                                    <th class = "bg-dark text-white text-center p-3 position-sticky sticky-top">OrderDetails</th>
                                </thead>
                                <tbody>
                                <?php
                                    while($comanda = $comandes->fetch_assoc()){
                                    ?>
                                        <tr class = "p-2">
                                            <td class = "border border-secondary text-center p-3 bg-dark text-white"><?php echo $comanda["OrderID"]?></td>
                                            <td class = "border border-secondary text-center p-3"><?php echo $comanda["FirstName"]?> <?php echo $comanda["LastName"]?></td>
                                            <td class = "border border-secondary text-center p-3"><?php echo $comanda["OrderDate"]?></td>
                                            <td class = "border border-secondary text-center p-3"><?php echo $comanda["CompanyName"]?></td>
                                            <td class = "border border-secondary text-center p-3"><?php echo $comanda["ShipCountry"]?></td>
                                            <td class = "border border-secondary text-center p-3"><a href="order_details_client.php?order=<?php echo $comanda["OrderID"]?>" class = "text-info h3"><li class = "fa fa-book"></li></a></td>
                                        </tr>
                                    <?php
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php
                }
                else echo "<p>Aquest client no té comandes</p>";
            }
            else echo "<p>No s'ha trobat el client a consultar</p>";
        }
        else echo "<p>No s'ha pogut connectar amb el servidor</p>";
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