<?php
    //Section
    if(isset($_GET["section"])){
        $section = $_GET["section"];
        setcookie("section",$section,time()+(60));
    }
    else{
        if(isset($_COOKIE["section"])) $section = $_COOKIE["section"];
        else $section = "polvorons";
    }

    //Idioma
    if(isset($_GET["idioma"])){
        $idioma = $_GET["idioma"];
        setcookie("idioma",$idioma,time()+(60));
    }

    else{
        if(isset($_COOKIE["idioma"])) $idioma = $_COOKIE["idioma"];
        else $idioma = "ES";
    }

    //MidaLletra
    if(isset($_GET["midaLletra"])){
        $midaLletra = $_GET["midaLletra"];
        setcookie("midaLletra",$midaLletra,time()+(60));
    }
    else{
        if(isset($_COOKIE["midaLletra"])) $midaLletra = $_COOKIE["midaLletra"];
        else $midaLletra = "mitja";
    }
?>