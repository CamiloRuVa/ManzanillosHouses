<?php
    session_start();
    if(!isset($_SESSION['init'])){
        $id = '0';
        $nombre = "Iniciar Sesion";
        $img = "usuario.png";
        $link_Publicar = "publicar-falso.php";
        $link_Favoritos = "favoritos-falso.php";
    }else{
        $id = $_SESSION['init'][0];
        $nombre = $_SESSION['init'][1];
        $img = $_SESSION['init'][2];
        $link_Publicar = "publicar.php";
        $link_Favoritos = "favoritos.php";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manzanillo's Houses</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous">
    </script>
    <script src="funciones.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/normalize.css">
</head>

<body>
    <header class="main-header">
        <div class="barra1">
            <div class="img">
                <a href="/"><img class="logo-principal" src="img/logo.png" alt="logo"></a>
            </div>
            <div class="barra2">
                <div class="links">
                    <a href="/">Inicio</a>
                    <a href="busqueda.php">Busqueda</a>
                    <a href="<?php echo $link_Publicar?>">Publicar</a>
                </div>
                <div class="usuario">
                    <img src="img/img_usuarios/<?php echo $id?>/<?php echo $img?>" alt="usuario">
                    <?php if(isset($_SESSION['init'])){?>
                    <ul class="menu">
                        <li><a href="usuario.php"><?php echo $nombre ?></a>
                        <ul class="submenu">
                            <li>
                                <a href="php/cerrar_sesion.php">Cerrar Sesion</a>
                            </li>
                        </ul>
                        </li>
                    </ul>
                    <?php }else{ ?>
                        <a href="IniSesion.html">Iniciar Sesion</a>
                    <?php } ?>
                </div>
            </div>

            <div class="header-768 contenedor">
                <div class="lista">
                    <ul class="acorh">
                        <li>
                            <img src="img/menu.png" alt="">
                            <ul>
                                <li><a href="/">Inicio</a></li>
                                <li><a href="busqueda.php">Busqueda</a></li>
                                <li><a href="<?php echo $link_Publicar?>">Publicar</a></li>
                                <li><a href="IniSesion.php"><?php echo $nombre?></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </header>
    
    <div class="aviso-falso">
        <p>Ups! parece que no tienes una cuenta todavia</p>
        <a href="Inisesion.html">Registrate!</a>
    </div>

    <footer>
        <a href="/">ola</a>
    </footer>

</body>

</html>