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
        table{
            width:60%;
        }
        td{
            width:33%;
            font-size:15pt;
            padding:7px;
        }
    </style>
    <title>Document</title>

</head>
<body class = "p-4">
    <?php 
        if(isset($_POST["number"])){
            $num_principal = $_POST["number"];
        }
        else $num_principal = 5;
    ?>
    <h1 class = "mb-5 text-center">Taula de multiplicació del <?php echo $num_principal?></h1>
    <table border = "1" class = " mx-auto text-center mt-3">
        <?php
            for($i=0; $i < 10; $i++){
        ?>
        <tr>
            <td><?php echo $num_principal?></td>
            <td><?php echo ($i+1)?></td>
            <td><?php echo $num_principal*($i+1)?></td>
        </tr>
        <?php
            }
        ?>
        <form method = "POST" action = "resultat.php">
            <!--Entrada Número-->
            <label for = "camp_num" class = "ml-3 mb-3">Vols calcular la taula d'un altre número? : </label>
            <input type = "number" id = "camp_num" name = "number" class = "ml-2"/>
            <!--Submit-->
            <input type = "submit" value = "Enviar" class = "btn btn-dark mt-n1 ml-4"/>
        </form>
    </table>

    <!--JQuery and Bootstrap Bundle (includes Popper)-->
    <script src="http://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script language= "javascript">
        $(document).ready(function(){});
    </script>
</body>
</html>