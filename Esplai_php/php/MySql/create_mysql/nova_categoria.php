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
    <form action="mysql_create.php" method = "POST">
        <!--NomCategoria-->
        <div class = "form-group">
            <label for="text_name" class = "w-25">Nom de la Categoria:</label>
            <input type="text" id = "text_name" class = "form-control w-50" name="NomCategoria">
        </div>
        
        <!--Descripció de la categoria-->
        <div class = "form-group">
            <label for="text_descr" class ="d-block">Descripció:</label>
            <textarea name="Description" id="text_descr" cols="60" rows="5"></textarea>
        </div>
        
        <!--Submit-->
        <input type="submit" value = "Crear Categoria" class = "d-block btn btn-primary mx-auto">
    </form>

    <!--JQuery and Bootstrap Bundle (includes Popper)-->
    <script src="http://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script language= "javascript">
        $(document).ready(function(){});
    </script>
</body>
</html>