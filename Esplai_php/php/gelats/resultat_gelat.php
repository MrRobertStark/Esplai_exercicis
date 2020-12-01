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
        #img_producte{
            width:100%;
        }
        
    </style>
    <title>Document</title>

</head>
<body class = "p-5 bg-light">
    <?php 
        //Recollida del tipus
        if(isset($_POST["tipus"])) $tipus = $_POST["tipus"];
        else $tipus = 0;
        //Recollida del gust
        if(isset($_POST["gust"])) $gust = $_POST["gust"];
        else $gust = 0;
        //Recollida de la mida
        if(isset($_POST["mida"])) $mida = $_POST["mida"];
        else $mida = 0;

        //Array de les fotos
        var photos = [
            //Tipus de gelat
            //Bol
            [
                //Gust
                //Maduixa
                [
                    //Mida: gran, mitjà i petit
                    ["https://thumbs.dreamstime.com/b/ice-cream-strawberry-bowl-wafer-rolls-white-strawberries-napkin-wooden-boards-background-46903006.jpg"],
                    ["https://th.bing.com/th/id/OIP.z8zT7_UY7P-XuBwGyW5lZwC2Es?pid=Api&rs=1"],
                    ["https://s23991.pcdn.co/wp-content/uploads/2013/05/strawberry-ice-cream-recipe-fp.jpg"]
                ],
                //Vainilla
                [
                    //Mida: gran, mitjà i petit
                    ["https://duckysalwayshungry.files.wordpress.com/2012/11/9-12-12-015.jpg"],
                    ["https://www.creamish.com.au/wp-content/uploads/2017/09/Vanilla-Ice-Cream-in-Bowl-2-1.jpg"],
                    ["https://thumbs.dreamstime.com/b/vanilla-ice-cream-bowl-8692389.jpg"]
                ],
                //Xocolata
                [
                    //Mida: gran, mitjà i petit
                    ["https://th.bing.com/th/id/OIP.G1CBvWLrluXxqAhFp474jwHaE8?pid=Api&rs=1"],
                    ["http://www.momalwaysfindsout.com/wp-content/uploads/2016/03/chocolate-bowls-ice-cream.png"],
                    ["https://assets.epicurious.com/photos/56043a4f968c2fa94dc98a28/1:1/w_600,h_600/365792_hires.jpg"]
                ]
            ],
            //Tarrina
            [
                //Gust
                //Maduixa
                [
                    //Mida: gran, mitjà i petit
                    [],
                    [],
                    []
                ],
                //Vainilla
                [
                    //Mida: gran, mitjà i petit
                    [],
                    [],
                    []
                ],
                //Xocolata
                [
                    //Mida: gran, mitjà i petit
                    [],
                    [],
                    []
                ]
            ],
            //Cucurutxu
            [
                //Gust
                //Maduixa
                [
                    //Mida: gran, mitjà i petit
                    [],
                    [],
                    []
                ],
                //Vainilla
                [
                    //Mida: gran, mitjà i petit
                    [],
                    [],
                    []
                ],
                //Xocolata
                [
                    //Mida: gran, mitjà i petit
                    [],
                    [],
                    []
                ]
            ],
        ]

        
    ?>
    <div class = "container-fluid">
        <div class = "card mx-auto">
            <h1 class = "text-center py-4 bg-dark text-white">El resultat de la teva Comanda:</h1>
            <div class = "row">
                <div class="col col-12 col-md-6 p-5" id = "capa_img">
                    <img src = "https://thumbs.dreamstime.com/b/tres-bolas-del-helado-de-stracciatella-italiano-99634152.jpg" class = "card-img-top" alt = "img_gelat" id = "img_producte"/>
                </div>
                <div class="col col-12 col-md-6">
                    <div class = "card-body p-5">
                        <h3 class = "card-title mb-5">Títol del Gelat</h3>                    
                        <p class = "card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates pariatur inventore quidem cupiditate consequuntur modi accusantium quibusdam tenetur aperiam facere necessitatibus.</p>
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