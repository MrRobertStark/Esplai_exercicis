<!--Connexió a la base de dades-->
<?php 
    include("connexio_basedades.php");

    function arreglar_format_preu($preu){
        return  number_format((float)$preu, 2, ',', '.');
    }
?>

<!--Detalls de la comanda-->
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
            min-width:280px;
        }
        .contenidor_taula{
            overflow-x:scroll;
        }
        tbody tr:hover,tfoot tr:first-child:hover, tfoot tr:nth-child(2):hover{
            background-color:#e0e0e0;
        }
        @media screen and (max-width:576px){
            .contenidor_taula{
                padding:1em 0em;
            }
        }
    </style>
    <title>Document</title>

</head>
<body>
    <!--Header-->
    <div class = "container-fluid px-0 bg-dark text-white text-center py-4">
        <h1>Detalls de la comanda</h1>
    </div>

    <!--Link de navegació-->
    <div class = "container-fluid px-3 my-4">
        <a href="mostrar_clients.php" class = "position-relative float-left">Mostrar customers > </a>
        <a href="comandes_client.php" class = "position-relative float-left">Comandes clients > </a>
        <a href="order_details_client.php" class = "position-relative float-left">Detalls de la comanda</a>
    </div>

    <!--Contingut-->
    <div class = "container-fluid px-0 position-relative float-left">
    <?php
        if($servidor_connectat){
            if(isset($_GET["order"])){
                //Comandes query
                $sql_comandes =  "SELECT OrderID, ProductName, order_details.UnitPrice, Quantity, Discount, order_details.UnitPrice*Quantity*(1-Discount) AS FinalPrice FROM order_details INNER JOIN products ON products.ProductID = order_details.ProductID WHERE OrderID = '".$_GET['order']."'";
                $sql_contracte = "SELECT customers.CompanyName,customers.ContactName,customers.ContactTitle,customers.Phone, CONCAT(employees.FirstName,' ',employees.LastName) AS EmployeeName ,employees.Title,employees.Country AS EmployeeCountry,employees.HomePhone FROM orders INNER JOIN customers ON customers.CustomerID = orders.CustomerID INNER JOIN employees ON employees.EmployeeID = orders.EmployeeID WHERE OrderID = '".$_GET['order']."'";

                //Crides query
                $comandes = $conn->query($sql_comandes);
                $contracte = $conn->query($sql_contracte);
                //if($comandes->num_rows>0 && $contracte->num_rows>0){
                if(true){
                    $info_contracte = $contracte->fetch_assoc();
                ?>
                    <!--Informació bàsica del customer i del employee-->
                    <div class = "container-fluid">
                        <div class = "row">
                            <div class="col col-12 col-sm-6">
                                <!--Card del customer-->
                                <h3 class = "text-center my-4">Customer</h3>
                                <div class = "card m-2 shadow-lg mx-auto">
                                    <div class = "row">
                                        <div class="col col-12 col-lg-6 d-flex align-items-stretch">
                                            <!--Header card-->
                                            <div class = "card-header w-100 bg-primary">
                                                <img src="https://cdn0.iconfinder.com/data/icons/customers-and-service/512/5.png" alt="" class = "card-img-top rounded-circle w-100 d-block mx-auto">
                                            </div>
                                        </div>
                                        <div class="col col-12 col-lg-6 d-flex align-items-stretch">
                                            <!--Card-body-->
                                            <div class = "card-body p-4 my-auto">
                                                <h3 class = "card-title text-center"><?php echo $info_contracte["ContactName"]?></h3>
                                                <h4 class = "card-subtitle text-center text-muted mb-3"><?php echo $info_contracte["ContactTitle"]?></h4>
                                                <p class = "card-text text-center"><b>CompanyName</b><br> <span><?php echo $info_contracte["CompanyName"]?></span></p>
                                                <p class = "card-text text-center"><b>Phone </b><br><span><?php echo $info_contracte["Phone"]?></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-12 col-sm-6">
                                <!--Card del employee-->
                                <h3 class = "text-center my-4">Employee</h3>
                                <div class = "card m-2 shadow-lg mx-auto">
                                    <div class = "row">
                                        <div class="col col-12 col-lg-6 d-flex align-items-stretch">
                                            <!--Header card-->
                                            <div class = "card-header w-100 bg-success">
                                                <img src="https://cdn0.iconfinder.com/data/icons/customers-and-service/512/23.png" alt="" class = "card-img-top rounded-circle w-100 d-block mx-auto">
                                            </div>
                                        </div>
                                        <div class="col col-12 col-lg-6 d-flex align-items-stretch">
                                            <!--Card-body-->
                                            <div class = "card-body p-4 my-auto">
                                                <h3 class = "card-title text-center"><?php echo $info_contracte["EmployeeName"]?></h3>
                                                <h4 class = "card-subtitle text-center text-muted mb-3"><?php echo $info_contracte["Title"]?></h4>
                                                <p class = "card-text text-center">
                                                    <b>Country:</b><br><span><?php echo $info_contracte["EmployeeCountry"]?></span>
                                                </p>
                                                <p class = "card-text text-center">
                                                    <b>Phone:</b><br><span><?php echo $info_contracte["HomePhone"]?></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Llistat de les comandes del customer-->
                    <div class = "container-fluid contenidor_taula mt-3">
                        <hr class = "my-5">
                        <table class = "w-100 my-3">
                            <!--Header del table-->
                            <thead class = "bg-dark text-white text-center">
                                <th class = "p-3 h5">ProductName</th>
                                <th class = "p-3 h5">UnitPrice</th>
                                <th class = "p-3 h5">Quantity</th>
                                <th class = "p-3 h5">Discount</t1h>
                                <th class = "p-3 h5">FinalPrice</th>
                            </thead>
                            <!--Body del table-->
                            <tbody>
                            <?php
                                $total_preu = 0;
                                while($comanda = $comandes->fetch_assoc()){
                                    $preu_unitari = $comanda["UnitPrice"];
                                    $preu_final = $comanda["FinalPrice"];
                                    $total_preu += $preu_final;

                                    $preu_unitari=arreglar_format_preu($preu_unitari);
                                    $preu_final=arreglar_format_preu($preu_final);
                                ?>
                                    <tr class = "text-center">
                                        <td class = "py-3 px-2"><?php echo $comanda["ProductName"]?></td>
                                        <td class = "py-3 px-2"><?php echo $preu_unitari?>€</td>
                                        <td class = "py-3 px-2"><?php echo $comanda["Quantity"]?></td>
                                        <td class = "py-3 px-2"><?php echo arreglar_format_preu($comanda["Discount"])?>%</td>
                                        <td class = "py-3 px-2"><?php echo $preu_final?>€</td>
                                    </tr>
                                <?php
                                }
                            ?>
                            </tbody>
                            <!--Suma total dels preus-->
                            <tfoot class = "text-center">
                                <tr>
                                    <td class = "p-2">Import brut</td>
                                    <td class = "p-2">-</td>
                                    <td class = "p-2">-</td>
                                    <td class = "p-2">-</td>
                                    <td class = "p-2"><?php echo arreglar_format_preu($total_preu)?>€</td>
                                </tr>
                                <tr>
                                    <td class = "py-2">IVA</td>
                                    <td class = "py-2">-</td>
                                    <td class = "py-2">-</td>
                                    <td class = "py-2">-</td>
                                    <td class = "py-2">21%</td>
                                </tr>
                                <tr class = "bg-dark text-white">
                                    <td class="py-3 h4">Total Factura</td>
                                    <td class="py-3 h4"></td>
                                    <td class="py-3 h4"></td>
                                    <td class="py-3 h4"></td>
                                    <td class="py-3 h4"><?php echo arreglar_format_preu($total_preu*1.21)?>€</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                <?php
                }
                else echo "<p>Aquest client no té comandes al seu historial</p>";
            }
            else echo "<p>No s'ha trobat la comanda que es vol consultar</p>";
        }
        else echo "<p>No s'ha pogut connectar amb la base de dades</p>";
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