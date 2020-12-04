<?php
    include("control_cookies.php");
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
        .card-img-top{
            height:300px;
        }
        .card{
            margin:5px;
        }
    </style>
    <title>Document</title>

</head>
<body class = "bg-light" style = "<?php echo $mida?>">
    <!--Navbar-->
    <?php include("navbar.php")?>
    <!--Fi Navbar-->
    <div class = "container-fluid mt-5">
        <div class = "row p-5">
            <!--Producte 1-->
            <div class = "col col-12 col-md-6 col-lg-4">
                <div class = "card">
                    <img src="https://www.mykidstime.com/wp-content/uploads/2017/11/Crispy-chocolate-Christmas-Puddings.jpg" alt="turrons1" class = "card-img-top">
                    <div class = "card-body p-4">
                        <h4 class = "card-title text-center"><?php echo $traduccio_xoc?> 1</h4>
                        <p class = "card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque alias consectetur ullam ut impedit?<p>
                        <span class = "d-block w-100 text-center my-3 h4">20€</span>
                        <button class = "d-block w-100 text-center my-3 btn btn-success">Buy</button>
                    </div>
                </div>
            </div>
            <!--Producte 2-->
            <div class = "col col-12 col-md-6 col-lg-4">
                <div class = "card">
                    <img src="https://th.bing.com/th/id/OIP.FJVhiMcoi-_cqROMLzXJOQHaFj?pid=Api&rs=1" alt="turrons1" class = "card-img-top">
                    <div class = "card-body p-4">
                        <h4 class = "card-title text-center"><?php echo $traduccio_xoc?> 2</h4>
                        <p class = "card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque alias consectetur ullam ut impedit?<p>
                        <span class = "d-block w-100 text-center my-3 h4">10€</span>
                        <button class = "d-block w-100 text-center my-3 btn btn-success">Buy</button>
                    </div>
                </div>
            </div>
            <!--Producte 3-->
            <div class = "col col-12 col-md-6 col-lg-4">
                <div class = "card">
                    <img src="https://okdiario.com/img/2019/12/20/pastel-de-chocolate-arbol-de-navidad.jpg" alt="turrons1" class = "card-img-top">
                    <div class = "card-body p-4">
                        <h4 class = "card-title text-center"><?php echo $traduccio_xoc?> 3</h4>
                        <p class = "card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque alias consectetur ullam ut impedit?<p>
                        <span class = "d-block w-100 text-center my-3 h4">30€</span>
                        <button class = "d-block w-100 text-center my-3 btn btn-success">Buy</button>
                    </div>
                </div>
            </div>
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