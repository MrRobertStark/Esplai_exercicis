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
    <style type = "text/css"></style>
    <link rel = "stylesheet" type = "text/css" href = "estils.css"/>
    <title>Document</title>

</head>
<body class = "">
    <!--Header-->
    <div class = "container-fluid py-3 bg-dark text-white text-center">
        <h1>Llistat de clients</h1>
    </div>

    <!--Links de navegació-->
    <div class = "container-fluid px-3 mt-3">
        <a href="mostrar_clients.php">Buscar clients > </a>
    </div>

    <!--Contingut-->
    <div class = "container-fluid px-0">
    <?php
        if($servidor_connectat){

            //Actualitzar informació customer
            if(isset($_POST["customerId"])) include("update_customer.php");
            

            //Esborrar customer
            if(isset($_GET["erase"])) include("delete_customer.php");
            

            //Criteris de cerca Customer

            //Nom del customer
            if(isset($_GET["customer"])){
                $nomClient = $_GET["customer"];
                setcookie("customer",$nomClient,time()+(60*60));
            }
            elseif(isset($_COOKIE["customer"])){
                $nomClient = $_COOKIE["customer"];
            }
            else $nomClient = "";

            //País del customer
            if(isset($_GET["pais"])){
                $pais = $_GET["pais"];
                setcookie("pais",$pais,time()+(60*60));
            }
            elseif(isset($_COOKIE["pais"])){
                $pais = $_COOKIE["pais"];
            }
            else $pais = "";
        ?>
            <!--Formulari per filtrar els customers-->
            <form action="mostrar_clients.php" method = "GET" class = "w-75 mx-auto">
                <h2 class = "text-center h3">Filtre <span class = "fa fa-filter"></span></h2>

                <!--Formulari: nom del client-->
                <div class="form-group">
                    <label for="nomClient">Nom del client</label>
                <?php
                    if($nomClient!=""){
                    ?>
                        <input type="text" id = "nomClient" name = "customer" class = "form-control" value = "<?php echo $nomClient?>">
                    <?php
                    }
                    else{
                    ?>
                        <input type="text" id = "nomClient" name = "customer" class = "form-control" placeholder = "Nom del client">
                    <?php
                    }
                ?>
                    
                </div>
                <!--Formulari: país del client-->
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
            <div class = "container-fluid px-0 mt-5 container_taula">
            <?php
                if($nomClient=="")$nomClient = "_";
                if($pais=="") $pais = "_";
                $sql = "SELECT * FROM customers WHERE (ContactName LIKE '%".$nomClient."%') AND (Country LIKE '%".$pais."%')";
                $customers = $conn->query($sql);
                if($customers->num_rows>0){
                ?>

                    <!--Exposició de la informació cridada de la base de dades-->
                    <table class = "d-block mx-auto mb-5 p-0 text-center">
                        <!--table header: índex de la informació-->
                        <thead>
                            <th class = "bg-dark text-white py-3 px-1 position-sticky sticky-top">ID</th>
                            <th class = "bg-dark text-white py-3 px-1 position-sticky sticky-top">Companyia</th>
                            <th class = "bg-dark text-white py-3 px-1 position-sticky sticky-top">Nom client</th>
                            <th class = "bg-dark text-white py-3 px-1 position-sticky sticky-top">Càrrec</th>
                            <th class = "bg-dark text-white py-3 px-1 position-sticky sticky-top">Adreça</th>
                            <th class = "bg-dark text-white py-3 px-1 position-sticky sticky-top">Ciutat</th>
                            <th class = "bg-dark text-white py-3 px-1 position-sticky sticky-top">País</th>
                            <th class = "bg-dark text-white py-3 px-1 position-sticky sticky-top">Telèfon</th>
                            <th class = "bg-dark text-white py-3 px-1 position-sticky sticky-top">Editar</th>
                            <th class = "bg-dark text-white py-3 px-1 position-sticky sticky-top">Comandes</th>
                            <th class = "bg-dark text-white py-3 px-1 position-sticky sticky-top">El·liminar</th>
                        </thead>
                        <!--Fi table header-->

                        <!--Cos de la taula / contingut de la informació-->
                        <tbody>
                        <?php
                            while($customer = $customers->fetch_assoc()){
                            ?>
                                <tr>
                                    <td class = "p-1 py-2 bg-dark text-white customerid"><?php echo $customer["CustomerID"] ?></td>
                                    <td class = "p-1"><?php echo $customer["CompanyName"] ?></td>
                                    <td class = "p-1"><?php echo correcio_dada($customer["ContactName"]) ?></td>
                                    <td class = "p-1"><?php echo correcio_dada($customer["ContactTitle"]) ?></td>
                                    <td class = "p-1"><?php echo correcio_dada($customer["Address"]) ?></td>
                                    <td class = "p-1"><?php echo correcio_dada($customer["City"]) ?></td>
                                    <td class = "p-1"><?php echo correcio_dada($customer["Country"]) ?></td>
                                    <td class = "p-1"><?php echo correcio_dada($customer["Phone"]) ?></td>
                                    <td class = "p-1"><a href="formulari.php?cid=<?php echo $customer["CustomerID"]?>" class = "text-dark"><i class = "fa fa-pencil"></i></a></td>
                                    <td class = "p-1"><a href="comandes_client.php?cid=<?php echo $customer["CustomerID"]?>" class = "text-dark"><i class = "fa fa-book"></i></a></td>
                                    <td class = "p-1"><a href="#!" class = "text-dark"><i class = "fa fa-times eliminar" data-toggle="modal" data-target="#modal_erase"></i></a></td>
                                </tr>
                            <?php
                            }
                        ?>
                        </tbody>
                        <!--Fi del cos de la taula-->
                    </table>
                <?php
                }
                else{
                    //Missatge d'error: No s'han trobat customers amb el filtre aplicat-->
                ?>
                    <div class = "alert alert-primary p-4 mx-auto mt-5 pt-5">
                        <h2 class = "alert-heading mb-4">No s'han trobat resultats</h2>
                        <p>No existeix clients que coincideixin amb el filtre aplicat. Aplica un altre filtre o mira tots els clients existents.</p>
                        <hr>
                        <a href="mostrar_clients.php?customer=&pais=" class = "d-block w-50 mx-auto py-2 btn btn-success my-4">Mostrar tots els clients</a>
                    </div>
                <?php   
                } 
            ?>
            </div>
            <!--Fi resultat de la cerca-->
        <?php
        }
        else{
            //Missatge d'error: No s'ha pogut connectar amb el servidor
        ?>
            <div class = "alert alert-warning p-4 mx-auto mt-5 pt-5">
                <h2 class = "alert-heading mb-4">Error de connexió</h2>
                <p>Hi ha hagut un problema amb la connexió a la xarxa o connectant amb el servidor.</p>
                <hr>
                <p>Refresca la plana o intenta connectar-te un altre cop.</p>
                <a href="mostrar_clients.php" class = "d-block w-50 mx-auto py-2 btn btn-primary my-4">Tornar a connectar-se</a>
            </div>
        <?php
        }
    ?>
    </div>

    <!--Modal alerta el·liminar producte (Pop-up)--->
    <div class="modal fade" id="modal_erase" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <!--Titol de l'alerta pop up-->
                    <h4 class="modal-title text-center"><i class = "fa fa-warning"></i> El·liminar client <span class = "nom_client"></span></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <!--Missatge d'alerta-->
                    <p>Estàs segur que vols el·liminar el client "<span class = "nom_client"></span>"? No podràs tornar enrere si continues l'acció.</p>
                </div>
                <div class="modal-footer w-100">
                    <!--Opcions per a procedir amb l'operació-->
                    <div class = "row mx-auto">
                        <div class="col col-6">
                            <a href="#!" class = "btn btn-primary link_erase">Continuar</a>
                        </div>
                        <div class="col col-6">
                            <a href="#!" class = "btn btn-danger" data-dismiss="modal">Cancelar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <!--JQuery and Bootstrap Bundle (includes Popper)-->
    <script src="http://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script language= "javascript">
        $(document).ready(function(){
            <?php
                if(isset($_GET["erase"])){
                ?>
                    $(".modal_erase").modal("show");
                <?php
                }
                if(isset($_POST["customerId"])){
                ?>
                    $(".modal_update").modal("show");
                <?php
                }
            ?>

            $(".eliminar").click(function(data,status){
                var customer = $(this).parent().parent().siblings(".customerid").text();
                $(".nom_client").text(customer);
                $(".link_erase").attr("href","mostrar_clients.php?erase="+customer);
            });
        });
    </script>
</body>
</html>