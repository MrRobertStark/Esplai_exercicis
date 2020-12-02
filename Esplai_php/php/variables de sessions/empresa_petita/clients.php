<?php
    session_start();
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
        ul{
            list-style-type:none;
        }
        .media{
            margin:20px;
        }
    </style>
    <title>Document</title>

</head>
<body class = "">
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#!">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="productes.php">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link disabled" href="clients.php">Clients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="comandes.php">Comandes</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <a href = "login.php" class="btn btn-info my-2 my-sm-0">Log Out</a>
            </form>
        </div>
    </nav>
    <!--Fi NavBar-->
    <!--Contingut HTML-->
    <h1 class = "text-center my-5">Llistat de Clients de l'Empresa <i class = "fa fa-book"></i></h1>
    <div class ="container-fluid px-0">
        <div class = "container px-4">
            <ul class = "list-unstyled">
                <li class = "media row bg-light border border-default p-4" id = "Maria">
                    <div class = "col col-12 col-md-2 media-left align-self-center pb-4 pb-md-0"><img src="https://randomuser.me/api/portraits/women/50.jpg" alt="img_client" class = "rounded-circle mx-auto d-block"></div>
                    <div class = "col col-12 col-md-8 media-body ml-5 mt-3 mr-n1">
                        <h4>Maria de los Prados Queso</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis aspernatur cupiditate aut similique nemo mollitia exercitationem ad, veniam, quos, maxime ipsum saepe eveniet error. Rerum esse sunt necessitatibus dicta! Amet!</p>
                    </div>
                    <div class = "col col-12 col-md-2 media-right align-self-center"><a href="#!" class = "btn btn-outline-primary mt-4 d-inline-block">Contacta</a></div>
                </li>
                <li class = "media row bg-light border border-default p-4" id = "Pere">
                    <div class = "col col-12 col-md-2 media-left align-self-center pb-4 pb-md-0"><img src="https://randomuser.me/api/portraits/men/42.jpg" alt="img_client" class = "rounded-circle mx-auto d-block"></div>
                    <div class = "col col-12 col-md-8 media-body ml-5 mt-3 mr-n1">
                        <h4>Pere de las Cabras Vaqueras</h4>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsam sint laudantium unde minus sed recusandae optio aspernatur quibusdam. Tenetur, consequatur quibusdam atque pariatur repudiandae aspernatur est voluptate illum totam facilis?</p>
                    </div>
                    <div class = "col col-12 col-md-2 media-right align-self-center"><a href="#!" class = "btn btn-outline-primary mt-4 d-inline-block">Contacta</a></div>
                </li>
                <li class = "media row bg-light border border-default p-4" id = "Joan">
                    <div class = "col col-12 col-md-2 media-left align-self-center pb-4 pb-md-0"><img src="https://randomuser.me/api/portraits/men/89.jpg" alt="img_client" class = "rounded-circle mx-auto d-block"></div>
                    <div class = "col col-12 col-md-8 media-body ml-5 mt-3 mr-n1">
                        <h4>Joan el paio de Salamanca</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo quam expedita iusto suscipit eveniet? Nesciunt neque incidunt autem voluptates quisquam optio eum nisi, dicta architecto quo exercitationem cupiditate quos accusamus!</p>
                    </div>
                    <div class = "col col-12 col-md-2 media-right align-self-center"><a href="#!" class = "btn btn-outline-primary mt-4 d-inline-block">Contacta</a></div>
                </li>
            </ul>
        </div>
    </div>
    <!--Fi Contingut HTML-->

    <!--JQuery and Bootstrap Bundle (includes Popper)-->
    <script src="http://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script language= "javascript">
        $(document).ready(function(){
            //Canviem el CSS de l'usuari que acaba de fer login
            identify_user();

            function identify_user(){
                <?php
                    if(isset($_SESSION["username"])){
                        $nom_usuari = $_SESSION["username"];
                    }
                ?>
                var capa_usuari = $("#<?php echo $nom_usuari?>");
                $(capa_usuari).removeClass("bg-light");
                $(capa_usuari).addClass("bg-dark text-white");
                $(capa_usuari).children(".media-right").children().text("Editar");
                $(capa_usuari).children(".media-right").children().addClass("bg-primary text-white");
            }
        });
    </script>
</body>
</html>