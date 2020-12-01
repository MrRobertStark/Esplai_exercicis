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
        .card{
            width:70%;
        }
        
        .card-body{
            height:100%;
        }
        #capa_preus{
            position:absolute;
            right:150px;
            bottom:20px;
        }
        #preu_original{
            position:absolute;
            bottom:0px;
        }
        #blackfriday{
            position:absolute;
            left:50px;
        }
        
    </style>
    <title>Document</title>

</head>
<body class = "p-4 bg-light">
    <div class = "container">
        <div class = "card mx-auto p-5">
            <!--Títol del producte-->
            <h2 class = "card-title text-center mb-4">Rellotge Professional</h2>
            <div class = "row">
                <div class = "col col-6">
                    <img src = "http://www.mastersintime.com/pictures/braun-bnc006-bnc006bkbk-dcf-3866241.jpg" alt = "img_producte" class = "card-img-top"/>
                </div>
                <div class = "col col-6">
                    <div class = "card-body">
                        <p class = "card-text text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt eveniet soluta officiis tenetur recusandae ipsam accusamus magni porro debitis tempora veritatis minima repudiandae animi ducimus, velit numquam modi odit minus!</p>
                        <div class = "row">
                            <div class="col-12 col-lg-6">
                                <a href = "#!" class = "btn btn-success container-fluid">Pre-Order</a>
                            </div>
                            <div class="col-12 col-lg-6">
                                <a href = "#!" class = "btn btn-primary container-fluid">Purchase</a>
                            </div>
                        </div>
                    </div>
                    <div id = "capa_preus">
                        <h3 id = "preu_original">300€</h3>
                        <h2 id = "blackfriday">200€</h2>
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