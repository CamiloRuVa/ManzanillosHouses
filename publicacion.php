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


        <div class="contenido-principal">
            <div class="parte-superior">
                <div class="imagenes-casa">
                    <!--<div class="modal" id="img1">
                        <img src="img/casas/casa1.jpg" alt="">
                        <div class="cambiar">
                            <a href="">&#60</a>
                            <a href="">></a>
                        </div>
                    </div>
                    <ul class="galeria">
                        <li>
                            <a href="#target"><img src="img/img_casas/Jose/BC.png" alt=""></a>
                        </li>
                        <li>
                            <a href=""><img src="img/img_casas/Jose/GiornoP3.png" alt=""></a>
                        </li>
                    </ul>-->
                    <?php 
                    $idCASA = $_GET['id'];
                    $_GET['id'] = $idCASA;
                    include 'php/info-casa.php';
                    ?>
                    <div class="galeria">
                        <input type="radio" name="navegacion" id="_1" checked>
                        <img src="<?php echo $img_casas ?>" width="260" height="300" alt="Galeria CSS 1" />
                    </div>
                </div>
                <div class="info">
                    <p class="titulo-publicacion"><?php echo $tipo?> en <?php echo $estado?></p>
                    <p class="nombre-publicacion"><?php echo $nombre.' '.$apellidos.'  '.$num?></p>
                    <b><p>$<?php echo $precio?></p></b>
                    <p>Ubicación</p>
                    <p class="descripcion"><?php echo $direcc?></p>
                    <p>Descripción</p>
                    <p class="descripcion"><?php echo $desc?></p>
                    <div class="datos">
                        <div class="datos2">
                            <img src="img/inodoro.png" alt="">
                            <b><p>Baños</p></b>
                            <p><?php echo $banos?></p>
                        </div>
                        <div class="datos2">
                            <img src="img/cama.png" alt="">
                            <b><p>Cuartos</p></b>
                            <p><?php echo $recamaras?></p>
                        </div>
                        <div class="datos2">
                            <img src="img/coche.png" alt="">
                            <b><p>Cocheras</p></b>
                            <p><?php echo $cocheras?></p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="comentario">
            <div id="disqus_thread"></div>
    <script>
        /**
         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
        /*
        var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        */
        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document,
                s = d.createElement('script');
            s.src = 'https://manzanillo-homes.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

            </div>
                        

    </body>

    </html>