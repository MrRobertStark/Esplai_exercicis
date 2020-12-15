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
    <title>Insertar Categoria</title>

</head>
<body class = "p-4">
    <h1 class = "mb-4 text-center">MySQL: Insertar Categoria</h1>
    <p>
    <?php
        if(isset($_POST["NomCategoria"])){
            //Connexió amb el servidor
            $server = "localhost";
            $username = "root";
            $password = "";
            $database = "fundacioesplai_prova0";
            $conn = new mysqli($server,$username,$password,$database);
            //Si no hi ha hagut problemes de connexió amb la base de dades...
            if(!$conn->connect_error){
                //Comprovem que la categoria entrada no existia prèviament
                $sql = 'SELECT CategoryName FROM categories WHERE CategoryName="'.$_POST["NomCategoria"].'"';
                $results = $conn->query($sql);
                if($results->num_rows==0){
                    //Si no existia abans, afegeix-lo a la base de dades
                    $sql = 'INSERT INTO categories (CategoryName,categories.Description) VALUES ("'.$_POST["NomCategoria"].'","'.$_POST["Description"].'")';
                    if($conn->query($sql)) echo "La categoria s'ha creat correctament.";
                    else echo "No s'ha pogut crear la categoria";
                }
                else echo "La categoria <b>".$_POST["NomCategoria"]."</b> ja existia a la base de dades.";
            }
            else echo "Error de connexió amb la base de dades";
        }
    ?>
    </p>

    <!--JQuery and Bootstrap Bundle (includes Popper)-->
    <script src="http://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script language= "javascript">
        $(document).ready(function(){});
    </script>
</body>
</html>