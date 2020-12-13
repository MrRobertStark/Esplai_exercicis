<?php
    //Connexió a la Base de dades
    $server = "localhost";
    $username = "root";
    $password = "";
    $databasename = "fundacioesplai_prova0";
    $conn = new mysqli($server,$username,$password,$databasename);
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
        
    </style>
    <title>Document</title>

</head>
<body class = "p-4">
    <h1 class = "mb-4 text-center">Connexió a MySQL: Categories</h1>
    <div class = "container">
        <table border = "1" class = "mx-auto my-5">
            <thead>
                <tr>
                    <th class = "text-center px-5 py-2">CategoryID</th>
                    <th class = "text-center px-5 py-2">CategoryName</th>
                    <th class = "text-center px-5 py-2">Description</th>
                </tr>
            </thead>
            <tbody>
            <?php
                if(!$conn->connect_error){
                    $sql = "SELECT CategoryID, CategoryName, categories.Description FROM categories";
                    $categories = $conn->query($sql);
                    if($categories->num_rows > 0){
                        while($category = $categories->fetch_assoc()){
                ?>
                            <tr>
                                <td class = "px-5 py-2 text-center"><?php echo $category["CategoryID"]?></td>
                                <td class  ="px-5 py-2"><?php echo $category["CategoryName"]?></td>
                                <td class = "px-5 py-2"><?php echo $category["Description"]?></td>
                            </tr>
                <?php
                        }
                    }
                    else echo "<p>No hi ha resultats disponibles</p>";
                }
                else echo "<h2>No s'han pogut connectar amb el servidor!</h2>";
            ?>
            </tbody>
        </table>
    </div>
    

    <!--JQuery and Bootstrap Bundle (includes Popper)-->
    <script src="http://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script language= "javascript">
        $(document).ready(function(){});
    </script>
</body>
</html>