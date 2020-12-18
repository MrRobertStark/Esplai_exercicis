<!--Connexió a la base de dades-->
<?php include("connexio_basedades.php")?>

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
    </style>
    <title>Document</title>

</head>
<body>
    <!--Header-->
    <div class = "container-fluid px-0 bg-dark text-white text-center py-4">
        <h1>Detalls del producte</h1>
    </div>
    <!--Contingut-->
    <div class = "container-fluid px-0">
    <?php
        if($servidor_connectat){
            if(isset($_GET["order"])){
                $sql =  "SELECT orders.OrderID, orders.CustomerID, orders.EmployeeID, orders.OrderDate, orders.ShipCountry,"
                        ."order_details.ProductID, order_details.UnitPrice, order_details.Quantity, order_details.Discount, "
                        ."customers.CompanyName, customers.ContactName, customers.ContactTitle, customers.Country, "
                        ."employees.FirstName, employees.LastName, employees.Title, employees.Country, employees.HomePhone "
                        ."FROM orders "
                        ."INNER JOIN order_details ON order_details.OrderID = orders.OrderID "
                        ."INNER JOIN customers ON customers.CustomerID = orders.CustomerID "
                        ."INNER JOIN employees ON employees.EmployeeID = orders.EmployeeID "
                        ."WHERE orders.OrderID = '10507'";
                        
                $paquets = $conn->query($sql);
                if($paquets->num_rows>0){
                ?>
                    <div class = "container-fluid">
                        <div class = "row">
                            <div class="col col-12 col-sm-6">
                                <!--Card-->
                                <div class = "card m-2 shadow-lg mx-auto">
                                    <div class = "row">
                                        <div class="col col-12 col-lg-6 d-flex align-items-stretch">
                                            <!--Header card-->
                                            <div class = "card-header w-100 bg-primary">
                                                <img src="https://th.bing.com/th/id/OIP.81fadf1Wi0xhIK0VIkY-JAHaHa?pid=Api&rs=1" alt="" class = "card-img-top rounded-circle w-100 d-block mx-auto">
                                            </div>
                                        </div>
                                        <div class="col col-12 col-lg-6 d-flex align-items-stretch">
                                            <!--Card-body-->
                                            <div class = "card-body p-4">
                                                <h3 class = "card-title text-center">Card-title</h3>
                                                <h4 class = "card-subtitle text-center text-muted mb-4">Subtitle</h4>
                                                <div class = "row">
                                                    <div class="col col-12 col-lg-6">
                                                        <p class = "card-text"><b>CompanyName</b><br> <span>CompanyName</span></p>
                                                        <p class = "card-text"><b>Country:</b><br>Country</p>
                                                    </div>
                                                    <div class="col col-12 col-lg-6">
                                                        <p class = "card-text"><b>Phone: </b><br><span>Phone</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-12 col-sm-6">
                                <!--Card-->
                                <div class = "card m-2 shadow-lg mx-auto">
                                    <div class = "row">
                                        <div class="col col-12 col-lg-6 d-flex align-items-stretch">
                                            <!--Header card-->
                                            <div class = "card-header w-100 bg-success">
                                                <img src="https://th.bing.com/th/id/OIP.81fadf1Wi0xhIK0VIkY-JAHaHa?pid=Api&rs=1" alt="" class = "card-img-top rounded-circle w-100 d-block mx-auto">
                                            </div>
                                        </div>
                                        <div class="col col-12 col-lg-6 d-flex align-items-stretch">
                                            <!--Card-body-->
                                            <div class = "card-body p-4">
                                                <h3 class = "card-title text-center">Card-title</h3>
                                                <h4 class = "card-subtitle text-center text-muted mb-4">Subtitle</h4>
                                                <div class = "row">
                                                    <div class="col col-12 col-lg-12">
                                                        <h4 class = "">Description</h4>
                                                        <p class = "card-text">Education includes a BA in psychology from Colorado State University in 1970.  She also completed "The Art of the Cold Call."  Nancy is a member of Toastmasters International.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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