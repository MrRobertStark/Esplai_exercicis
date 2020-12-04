<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#!">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">

<?php
    if($section == "polvorons"){
?>
        <hr class = "bg-white">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link disabled" href="polvorons.php?">Polvorons<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="turrons.php?section=turrons">Turrons</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="xocolatines.php?section=xocolatines">Xocolatines</a>
            </li>
        </ul>
<?php
    }
        elseif($section == "turrons"){
?>
    
    <hr class = "bg-white">    
    <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="polvorons.php?section=polvorons">Polvorons</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link disabled" href="turrons.php?section=turrons">Turrons<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="xocolatines.php?section=xocolatines">Xocolatines</a>
            </li>
        </ul>
<?php
    }
    else{
?>
        <hr class = "bg-white">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="polvorons.php?section=polvorons">Polvorons</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="turrons.php?section=turrons">Turrons</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link disabled" href="xocolatines.php?section=xocolatines">Xocolatines<span class="sr-only">(current)</span></a>
            </li>
        </ul>
<?php
    }
    if($idioma == "ES"){
?>
        <hr class = "bg-white">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link disabled" href="<?php echo $section?>.php?&idioma=ES">ES<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $section?>.php?&idioma=EN">EN</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $section?>.php?&idioma=CAT">CAT</a>
            </li>
        </ul>
<?php
    }
    elseif ($idioma == "EN"){
?>
        <hr class = "bg-white">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $section?>.php?&idioma=ES">ES</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link disabled" href="<?php echo $section?>.php?&idioma=EN">EN<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $section?>.php?&idioma=CAT">CAT</a>
            </li>
        </ul>
<?php
    }
    else{
?>
        <hr class = "bg-white">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $section?>.php?&idioma=ES">ES</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $section?>.php?&idioma=EN">EN</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link disabled" href="<?php echo $section?>.php?&idioma=CAT">CAT<span class="sr-only">(current)</span></a>
            </li>
        </ul>
<?php
    }
    if($midaLletra == "petit"){
?>
        <hr class = "bg-white">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link disabled" href="<?php echo $section?>.php?&midaLletra=petit">a<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $section?>.php?midaLletra=mitja">A</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $section?>.php?&midaLletra=gran">AA</a>
            </li>
        </ul>
<?php
    }
    elseif($midaLletra == "mitja"){
?>
        <hr class = "bg-white">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $section?>.php?midaLletra=petit">a</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link disabled" href="<?php echo $section?>.php?midaLletra=mitja">A<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $section?>.php?&midaLletra=gran">AA</a>
            </li>
        </ul>
<?php
    }   
    else{
?>
        <hr class = "bg-white">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $section?>.php?midaLletra=petit">a</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $section?>.php?midaLletra=mitja">A</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link disabled" href="<?php echo $section?>.php?&midaLletra=gran">AA<span class="sr-only">(current)</span></a>
            </li>
        </ul>
<?php
    }
?>

        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <a href = "#!" class="btn btn-info my-2 my-sm-0">Buscar</a>
        </form>
    </div>
</nav>