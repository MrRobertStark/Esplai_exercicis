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
        .fa{
            width:20px;
        }
        .container{
            width:1000px;
            position:absolute;
            left:50%;
            margin-left:-500px;
            top:50%;
            margin-top:-20%;
        }
    </style>
    <title>Document</title>

</head>
<?php
    session_unset();
?>
<body class = "py-4 mx-0 bg-primary">
    <form method = "POST" action = "productes.php">
        <div class = "container">
            <div class = "card w-50 mx-auto py-4 text-center">
                <div class = "card-body">
                    <!--Títol Login-->
                    <h3 class = "card-title">LOGIN</h3>
                    <!--Cos Input Informació Login-->
                    <!--Nom de l'usuari-->
                    <label class = "mt-2">Nom Usuari:</label>
                    <div class = "input-group form-group justify-content-center">
                        <div class = "input-group-prepend">
                            <span class = "input-group-text"><i class = "fa fa-user"></i></span>
                        </div>
                        <input type = "text" placeholder = "Nom Usuari" name = "username">
                    </div>
                    <!--Password-->
                    <label class = "mt-2">PassWord:</label>
                    <div class = "input-group form-group justify-content-center">
                        <div class = "input-group-prepend">
                            <span class = "input-group-text"><i class = "fa fa-key"></i></span>
                        </div>
                        <input type = "text" placeholder = "PassWord" name = "password"/>
                    </div>
                </div>
                <!--Enviar FOrmulari-->
                <input type = "submit" value = "Login" class ="btn btn-info d-block mx-auto w-50"/>  
            </div>
        </div>
    </form>

    

    <!--JQuery and Bootstrap Bundle (includes Popper)-->
    <script src="http://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script language= "javascript">
        $(document).ready(function(){});
    </script>
</body>
</html>