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
        elseif(isset($_GET["tipus"])) $tipus = $_GET["tipus"];
        else $tipus = 0;

        //Recollida del gust
        if(isset($_POST["gust"])) $gust = $_POST["gust"];
        elseif(isset($_GET["gust"])) $gust = $_GET["gust"];
        else $gust = 0;

        //Recollida de la mida
        if(isset($_POST["mida"])) $mida = $_POST["mida"];
        elseif(isset($_GET["mida"])) $mida = $_GET["mida"];
        else $mida = 0;

        $nom_tipus = array("Bol","Tarrina","Cucurutxu");
        $nom_gusts = array("maduixa","vainilla","xocolata");
        $nom_mides = array("gran","mitjà","petit");

        //Array de les fotos
        $photos = array(
            //Tipus de gelat
            //Bol
            array(
                //Gust
                //Maduixa
                array(
                    //Mida: gran, mitjà i petit
                    "https://thumbs.dreamstime.com/b/ice-cream-strawberry-bowl-wafer-rolls-white-strawberries-napkin-wooden-boards-background-46903006.jpg",
                    "https://th.bing.com/th/id/OIP.z8zT7_UY7P-XuBwGyW5lZwC2Es?pid=Api&rs=1",
                    "https://s23991.pcdn.co/wp-content/uploads/2013/05/strawberry-ice-cream-recipe-fp.jpg"
                ),
                //Vainilla
                array(
                    //Mida: gran, mitjà i petit
                    "https://duckysalwayshungry.files.wordpress.com/2012/11/9-12-12-015.jpg",
                    "https://www.creamish.com.au/wp-content/uploads/2017/09/Vanilla-Ice-Cream-in-Bowl-2-1.jpg",
                    "https://thumbs.dreamstime.com/b/vanilla-ice-cream-bowl-8692389.jpg"
                ),
                //Xocolata
                array(
                    //Mida: gran, mitjà i petit
                    "https://th.bing.com/th/id/OIP.G1CBvWLrluXxqAhFp474jwHaE8?pid=Api&rs=1",
                    "http://www.momalwaysfindsout.com/wp-content/uploads/2016/03/chocolate-bowls-ice-cream.png",
                    "https://assets.epicurious.com/photos/56043a4f968c2fa94dc98a28/1:1/w_600,h_600/365792_hires.jpg"
                )
            ),
            //Tarrina
            array(
                //Gust
                //Maduixa
                array(
                    //Mida: gran, mitjà i petit
                    "http://recetasbabyledweaning.com/wp-content/uploads/2017/06/heladofresa-1020x528.jpg",
                    "https://i.pinimg.com/originals/6f/3d/32/6f3d3267122ee4d7c88856dce64399aa.jpg",
                    "https://beptruong.edu.vn/wp-content/uploads/2015/12/kem-dau-tay-tuoi-mat.jpg"
                ),
                //Vainilla
                array(
                    //Mida: gran, mitjà i petit
                    "https://www.kff.co.uk/images_products/L_vanilla-ice-cream-tubs.jpg",
                    "https://sevilla.abc.es/gurme/wp-content/uploads/2017/05/vainilla-tahiti-Los-Valencianos-1946-1440x810.jpg",
                    "https://www.bofrost.es/writable/products/images-v2/08063.jpg"
                ),
                //Xocolata
                array(
                    //Mida: gran, mitjà i petit
                    "https://sgfm.elcorteingles.es/SGFM/dctm/MEDIA03/201902/06/00118952001107____4__600x600.jpg",
                    "https://i2.wp.com/unboundwellness.com/wp-content/uploads/2020/08/brownie_3.jpg",
                    "https://members.rudymawer.com/wp-content/uploads/2018/05/35279492_l.jpg"
                )
            ),
            //Cucurutxu
            array(
                //Gust
                //Maduixa
                array(
                    //Mida: gran, mitjà i petit
                    "https://numstheword.com/wp-content/uploads/2018/05/RASPBERRY-ICE-CREAM2-4.jpg",
                    "http://thumbs.dreamstime.com/z/cono-de-helado-de-fresa-5100687.jpg",
                    "https://thumbs.dreamstime.com/z/cono-de-helado-de-fresa-en-blanco-11344405.jpg"
                ),
                //Vainilla
                array(
                    //Mida: gran, mitjà i petit
                    "https://st2.depositphotos.com/4366637/12184/i/950/depositphotos_121847778-stock-photo-vanilla-ice-cream-with-chocolate.jpg",
                    "https://www.lasirena.es/35786-thickbox_default/conos-helados-vainilla-sin-azucares-anadidos.jpg",
                    "https://th.bing.com/th/id/OIP.7j9iYycYDJFwjcUqqUjRoAHaHa?pid=Api&rs=1"
                ),
                //Xocolata
                array(
                    //Mida: gran, mitjà i petit
                    "https://th.bing.com/th/id/OIP.UpMiHth5D-nKobLfhUdT7gHaLH?pid=Api&rs=1",
                    "https://th.bing.com/th/id/OIP.vadcg8m7PzirHQe-9ngz1AHaFj?pid=Api&rs=1",
                    "https://thumbs.dreamstime.com/b/chocolate-ice-cream-cone-10744666.jpg"
                )
            )
        );
        
    ?>
    <div class = "container-fluid">
        <div class = "card mx-auto">
            <h1 class = "text-center py-4 bg-dark text-white">El resultat de la teva Comanda:</h1>
            <div class = "row">
                <div class="col col-12 col-md-6 p-5" id = "capa_img">
                    <img src = "<?php echo $photos[$tipus][$gust][$mida] ?>" class = "card-img-top" alt = "img_gelat" id = "img_producte"/>
                </div>
                <div class="col col-12 col-md-6">
                    <div class = "card-body p-5">
                        <h3 class = "card-title mb-5"><?php echo $nom_tipus[$tipus]." de ".$nom_gusts[$gust]." ".$nom_mides[$mida] ?></h3>                    
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