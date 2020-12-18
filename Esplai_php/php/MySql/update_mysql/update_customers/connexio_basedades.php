<?php
    //Connexió amb la base de dades
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "fundacioesplai_prova0";
    $conn = new mysqli($server,$username, $password,$database);
    $servidor_connectat = !$conn->connect_error;
?>