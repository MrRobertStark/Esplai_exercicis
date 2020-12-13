<?php
    //Imatges predeterminades segons categoria del
    $img_categories = array(
        "https://imgcp.aacdn.jp/img-a/1720/auto/global-aaj-front/article/2016/02/56b9a4f563c99_56b9a4c99915d_1461357925.jpg",//Beverages
        'https://th.bing.com/th/id/OIP.KE4GTMVNr7S4sQ92EplZeQHaE8?pid=Api&rs=1',//Condiments
        'https://s3.amazonaws.com/gmi-digital-library/8331c5b2-c170-4fc2-8ad6-8cf49737d50a.jpg',//COnfections
        'https://www.midwestfarmreport.com/wp-content/uploads/2020/04/Cheese-image-scaled.jpg',//Dairy Products
        'https://www.tasteofhome.com/wp-content/uploads/2018/03/shutterstock_578723482.jpg',//Grains/Cereals
        'https://imgix.bustle.com/uploads/shutterstock/2019/10/2/c4e16774-a924-44af-9546-c9059cf24f61-shutterstock-1255329469.jpg?w=970&h=546&fit=crop&crop=faces&auto=format&q=70',//Meat/Pultry
        'https://www.simplyrecipes.com/wp-content/uploads/2018/06/june-produce-horiz-a2-1800.jpg',//Produce
        'https://th.bing.com/th/id/OIP.URZH3ow_SgyIZq4TcY2OCgHaE7?pid=Api&rs=1',//Seafood
        'https://www.londonlibrary.co.uk/images/CHARLOTTE/NEW_WEBSITE_IMAGES/adoptbanner.jpg'//Books
    );
    //Connectem amb el servidor
    $server = "localhost";
    $username = "root";
    $password = "";
    $databasename = "fundacioesplai_prova0";
    $conn = new mysqli($server,$username,$password,$databasename);
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
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }
        body{
            min-width:450px;
        }
        input[type="submit"]{
            min-width:150px;
        }
        .card-body .btn{
            position:absolute;
            bottom:0px;
            width:75%;
            left:50%;
            margin-left:-37.5%;
        }
        @media screen and (max-width:575px){
            nav .boto_submit{
                margin:0px auto;
                width:75%;
            }
        }
    </style>
    <title>Document</title>

</head>
<body class = "py-5">

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow">
        <a class="navbar-brand" href="#">
            Navbar
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!--Links seccions-->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#main_container">Home <span class="sr-only">(current)</span></a>
                </li>
                <hr class = "w-100 bg-light">
                <?php
                //Si no hi ha hagut cap error amb la connexió de la base de dades, emplena la secció de categories...
                    if(!$conn->connect_error){
                        //Si s'ha pogut connectar amb el servidor llavors fes la crida amb les categories disponibles
                        $sql = "SELECT CategoryID,CategoryName FROM categories";
                        $categories = $conn->query($sql);
                        if($categories->num_rows>0){
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categories
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="resultatFinal.php?category=0">Tot el catàleg</a>
                <?php
                            while($categoria = $categories->fetch_assoc()){
                ?>
                        <a class="dropdown-item" href="resultatFinal.php?category=<?php echo $categoria["CategoryID"]?>"><?php echo $categoria["CategoryName"]?></a>
                <?php
                            }
                        }
                    }
                ?>
                    </div>
                </li>
                <hr>
                <li class = "nav-item">
                    <a href="https://fundacionesplai.org/contacto/" class = "nav-link">Contacte</a>
                </li>
            </ul>
            <!--Fi Links seccions-->
            <!--Buscador-->
            <form class="form-inline my-2 my-lg-0" action="resultatFinal.php" method="GET">
                <label for="search" class = "btn"><i class = "fa fa-search h4 my-auto text-white"></i></label>
                <input class="form-control mx-2" type="search" placeholder="Search" aria-label="Search" id = "search" name="product">
                <button class="btn btn-primary my-5 my-md-2 my-sm-0 boto_submit" type="submit">Buscar</button>
            </form>
            <!--Fi buscador-->
        </div>
      </nav>
    <!--Fi Navbar-->

    <!--Introducció del programa-->
    <?php
        if(!$conn->connect_error){

    ?>
        <h1 class = "text-center mt-5">Catàleg dels productes</h1>
        <!-- Search form -->
        <form class="form-inline d-flex justify-content-center md-form form-sm mt-0 p-5" action = "resultatFinal.php" method = "GET">
            <!--ProductName-->
            <div class = "container-fluid text-center">
                <label for="textSearch" class = "btn d-inline-block"><i class="fa fa-search h4 my-auto" aria-hidden="true"></i></label>
                <input class="form-control ml-3 w-75 py-4 px-3 mx-auto" type="text" placeholder="Nom del producte" aria-label="Search" id = "textSearch" name="product">
            </div>

            <div class = "container-fluid text-center my-4">
                <!--ProductCategory-->
                <label for="selectCategories" class = "btn d-inline-block"><i class = "fa fa-compass h3 my-auto" aria-hidden="true"></i></label>
                <select name="category" id="selectCategories" class = "form-control form-control-lg w-75 mx-auto">
                <?php
                    $categories_cerca = $conn->query($sql);
                    if($categories_cerca->num_rows>0){
                ?>
                        <option value="0">Tot el catàleg</option>
                <?php
                        while($categoria = $categories_cerca->fetch_assoc()){
                ?>
                            <option value="<?php echo $categoria["CategoryID"]?>"><?php echo $categoria["CategoryName"]?></option>
                <?php
                        }
                    }
                    else {
                ?>
                        <option class = "text-danger">No s'han trobat categories</option>
                <?php
                    }
                ?>
                </select>
            </div>

            <div class = "container-fluid text-center">
                <input type="submit" value = "Buscar producte" class = "btn btn-primary w-25 p-2 mt-3">
            </div>
            
        </form>
        <!--FI Introducció del programa-->

        <!--Capa dels resultats-->
        <div class = "container-fluid shadow shadow-lg py-5">
            <?php
            if(isset($_GET["category"]) || isset($_GET["product"])){
            
                $categoria = ">=0";
                $nomProducte = "_";
                if(isset($_GET["category"]) && $_GET["category"]!=0) $categoria = "=".$_GET["category"];
                if(isset($_GET["product"]))$nomProducte=$_GET["product"];

                $sql = 
                    'SELECT ProductID, ProductName, CompanyName, CategoryName, products.CategoryID , UnitPrice, UnitsInStock, Discontinued '
                    .'FROM products '
                    .'INNER JOIN categories ON categories.CategoryID = products.CategoryID '
                    .'INNER JOIN suppliers ON suppliers.SupplierID = products.SupplierID '
                    .'WHERE (products.CategoryID '.$categoria.') AND (ProductName LIKE "%'.$nomProducte.'%") '
                    .'ORDER BY ProductName ';
                    
                $productes = $conn->query($sql);
                if($productes->num_rows>0){
            ?>
                    <h2 class = "text-center bg-dark text-white py-4">Resultat de la cerca</h2>
                        <div class = "row p-4">
            <?php
                    while($product = $productes->fetch_assoc()){
            ?>
                        <!--Fitxa del producte-->
                        <div class="col col-12 col-md-6 col-lg-4 mx-auto d-flex align-items-stretch">
                            <div class = "card m-2 pb-5 shadow w-100">
                                <!--Imatge del producte (Com no el puc recuperar, hi poso la foto de la categoria)-->
                                <a href="resultatFinal.php?product=<?php echo $product["ProductName"]?>"><img src="<?php echo $img_categories[($product["CategoryID"])-1]?>" alt="img_producte" class = "card-img-top mb-3"></a>
                                <div class = "card-body p-4 p-lg-0">
                                    <!--Nom del producte-->
                                    <h2 class = "card-title text-center h3"><?php echo $product["ProductName"]?></h2>
                                    <!--Categoria del producte-->
                                    <h3 class = "card-subtitle text-center text-muted h4"><?php echo $product["CategoryName"]?></h3>
                                    <div class = "row p-2 mt-3 mx-auto">
                                        <!--Informació bàsica del producte-->
                                        <div class="col-12 col-sm-6">
                                            <p><b>Proveïdors: </b><span><?php echo $product["CompanyName"]?></span></p>
                                            <p><b>Stock: </b><span><?php echo $product["UnitsInStock"]?></span> unitats</p>
                                        </div>
                                        <div class="col-12 col-sm-5 offset-sm-1 col-md-6 offset-md-0">
                                            <p>
                                                <b>Status: </b>
                                                <?php 
                                                    if($product["Discontinued"]){
                                                ?>
                                                        <span class = "text-danger">Producció discontinuada</span>
                                                <?php
                                                    }
                                                    else{
                                                ?>
                                                        <span class = "text-success">En producció</span>
                                                <?php
                                                    }
                                                ?>
                                            </p>
                                            <!--Preu del producte-->
                                            <p><b>Unit Price: </b><span><?php echo number_format((float)$product["UnitPrice"], 2, ',', '');  // Outputs -> 105.00?></span> €</p>
                                        </div>
                                    </div>
                                    <!--Botó per buscar aquest producte en concret a tota el catàleg-->
                                    <a href="resultatFinal.php?product=<?php echo $product["ProductName"]?>" class = "btn btn-primary d-block my-3 w-75">Examinar</a>
                                </div>
                            </div>
                        </div>
            <?php   
                    }
                }
                else if($productes->num_rows==0){
            ?>
                    <h2 class = "text-center bg-dark py-4 text-white">No s'han trobat resultats <i class = "fa fa-bell-o"></i></h2>
            <?php
                }
            }
            else{
            ?>
                <h2 class = "text-center my-auto bg-dark text-white py-4">Fes una recerca! <i class = "fa fa-search h2"></i></h2>
            <?php
            }
            ?>
            </div>
        </div>
    <?php
        }
        else echo "Error de connexió amb la base de dades";
    ?>
    <!--Fi capa dels resultats-->

    <!--JQuery and Bootstrap Bundle (includes Popper)-->
    <script src="http://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script language= "javascript">
        $(document).ready(function(){});
    </script>
</body>
</html>