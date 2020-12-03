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
    <style type = "text/css"></style>
    <title>Document</title>

</head>
<body class = "p-4">
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#!">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php
                    if($section == "polvorons"){
                ?>
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link disabled" href="#!">Polvorons<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="turrons.php">Turrons</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="xocolatines.php">Xocolatines</a>
                            </li>
                        </ul>
                <?php
                    }
                    elseif($section == "turrons"){
                ?>
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#!">Polvorons</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link disabled" href="#!">Turrons<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="xocolatines.php">Xocolatines</a>
                            </li>
                        </ul>
                <?php
                    }
                    else{
                ?>
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#!">Polvorons</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="turrons.php">Turrons</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link disabled" href="xocolatines.php">Xocolatines<span class="sr-only">(current)</span></a>
                            </li>
                        </ul>
                <?php
                    }
                    if($idioma == "ES"){
                ?>
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link disabled" href="#">ES<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#!">EN</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#!">CAT</a>
                            </li>
                        </ul>
                <?php
                    }
                    elseif ($idioma == "EN"){
                ?>
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#">ES</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link disabled" href="#!">EN<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#!">CAT</a>
                            </li>
                        </ul>
                <?php
                    }
                    else{
                ?>
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#">ES</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#!">EN</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link disabled" href="#!">CAT<span class="sr-only">(current)</span></a>
                            </li>
                        </ul>
                <?php
                    }
                    if($midaLletra == "petit"){
                ?>
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link disabled" href="#!">a<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#!">A</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mt-n1" href="#!" style = "font-size:15pt;">A</a>
                            </li>
                        </ul>
                <?php
                    }
                    elseif($midaLletra == "mitja"){
                ?>
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#!">a</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link disabled" href="#!">A<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mt-n1" href="#!" style = "font-size:15pt;">A</a>
                            </li>
                        </ul>
                <?php
                    }   
                    else{
                ?>
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#!">a</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#!">A</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link mt-n1 disabled" href="#!" style = "font-size:15pt;">A<span class="sr-only">(current)</span></a>
                            </li>
                        </ul>
                <?php
                    }
                ?>
            

            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <a href = "login.php" class="btn btn-info my-2 my-sm-0">Buscar</a>
            </form>
        </div>
    </nav>
    <!--Fi NavBar-->
    <?php
        echo $section." ".$idioma." ".$midaLletra;
    ?>

    <!--JQuery and Bootstrap Bundle (includes Popper)-->
    <script src="http://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script language= "javascript">
        $(document).ready(function(){});
    </script>
</body>
</html>