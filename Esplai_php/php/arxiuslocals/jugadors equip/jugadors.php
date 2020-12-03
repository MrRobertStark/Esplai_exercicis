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
        img.container-fluid{
            filter:brightness(50%);
            height:600px;
        }
        h1{
            position:absolute;
            top:40%;
            width:100%;
            text-align:center;
            font-size:40pt;
            color:white;
        }
        img.rounded-circle{
            max-width:120px;
        }
    </style>
    <title>Document</title>

</head>
<body>
    <div class = "container-fluid px-0 mb-5">
        <img src = "https://fortwo.es/wp-content/uploads/2019/05/bolera-pedralbes-barcelona.jpg" alt = "img_bolera" class = "d-block container-fluid px-0"/>
        <h1>Llistat de Jugadors Bolera</h1>
    </div>
    <div class ="container-fluid px-0">
        <div class = "container px-4">
            <ul class = "list-unstyled">
                <li class = "media my-3 row bg-light border border-default p-4" id = "Maria">
                    <div class = "col col-12 col-md-2 media-left align-self-center pb-4 pb-md-0"><img src="https://s-media-cache-ak0.pinimg.com/736x/71/f3/51/71f3519243d136361d81df71724c60a0.jpg" alt="img_client" class = "rounded-circle mx-auto d-block"></div>
                    <div class = "col col-12 col-md-8 media-body ml-5 mt-3 mr-n1">
                        <h4>Maria de los Prados Queso</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis aspernatur cupiditate aut similique nemo mollitia exercitationem ad, veniam, quos, maxime ipsum saepe eveniet error. Rerum esse sunt necessitatibus dicta! Amet!</p>
                    </div>
                    <div class = "col col-12 col-md-2 media-right align-self-center"><a href="#!" class = "btn btn-outline-primary mt-4 d-inline-block">Eliminar</a></div>
                </li>
                
            </ul>
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