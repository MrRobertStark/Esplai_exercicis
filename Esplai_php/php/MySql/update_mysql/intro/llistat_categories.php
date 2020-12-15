<!--Connexió a la base de dades i URLS imates categories-->
<?php include("connexio_basedades.php");?>

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
        body{
            min-width:445px;
        }
        .card .btn{
            bottom:30px;
            left:50%;
            margin-left:-37.5%;
        }
        @media screen and (max-width:529px){
            .row{
                margin-top:-30px;
            }
            .header{
                padding:1.5em!important;
            }
            .header > h1{
                font-size:24pt;
            }
        }
    </style>
    <title>Document</title>

</head>
<body class = "p-4">
    <!--Header-->
    <div class = "container-fluid bg-dark text-center text-white py-5 fixed-top header">
        <h1 class = "my-auto">Actualitzar categoria: Menú</h1>
    </div>

    <!--Llistat de categories-->
    <div class = "container-fluid p-5 mt-5">
        <div class ="row pt-5">
        <?php
            if(!$conn->connect_error){
                $sql = "SELECT CategoryID, CategoryName, categories.Description FROM categories ORDER BY CategoryName";
                $categories = $conn->query($sql);
                if($categories->num_rows>0){
                    while($categoria = $categories->fetch_assoc()){
                    ?>
                        <!--Generació d'etiqueta-->
                        <div class="col col-12 col-md-6 col-lg-4 d-flex align-item-stretch mx-auto">
                            <div class = "card shadow-lg m-3 pb-5">
                                <a href = "dades_categoria.php?category=<?php echo $categoria["CategoryID"]?>"><img src="<?php echo $img_categories[$categoria["CategoryID"] - 1]?>" alt="<?php echo $categoria["CategoryName"]?>" class = "card-img-top"></a>
                                <div class = "card-body p-4">
                                    <h2 class = "card-title text-center mb-3"><?php echo $categoria["CategoryName"]?></h2>
                                    <p class = "card-text text-justify"><?php echo $categoria["Description"]?></p>
                                    <a href="dades_categoria.php?category=<?php echo $categoria["CategoryID"]?>" class = "position-absolute btn btn-primary w-75">Actualitzar Categoria</a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                }
                else{
                ?>
                    <p>No hi ha categories disponibles</p>
                <?php
                }
            }
            else{
            ?>
                <p>Error connectant amb la base de dades</p>
            <?php
            }
        ?>
        </div>
    </div>

    <!--JQuery and Bootstrap Bundle (includes Popper)-->
    <script src="http://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script language= "javascript">
        $(document).ready(function(){});
    </script>
</body>
</html>