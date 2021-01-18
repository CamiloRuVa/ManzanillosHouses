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

    	/* Connect To Database*/
	include 'php/connect.php';
	$active_usuarios="";	
	$active_perfil="active";	
	$title="Perfil";
	
	$query=mysqli_query($conn,"select * from publicaciones where id_usuario=$id");
	$row=mysqli_fetch_array($query);
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
                    <a href="index.php">Inicio</a>
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

    <div class="container">
        <div class="row">
        <form method="post" id="perfil">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 toppad" >
     
     
            <div class="panel panel-success"><br>
                <h2 class="panel-title"><center><font size="5"><i class='glyphicon glyphicon-user'></i>Mis Publicaciones</font></center></h2>
  
              <div class="panel-body">
                <div class="row">
                
                  <div class="col-md-3 col-lg-3 " align="center"> 
                 
                  <br>				
                      
                  </div>
                  <center>
                        <div class="perfil-info">
                        <table class="table-usuario">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Recamaras</th>
                                    <th scope="col">Baños</th>
                                    <th scope="col">Cocheras</th>
                                    <th scope="col">Estado</th>
                                </tr>
                            </thead>
                            <tbody id="datos">
                            <?php
                             foreach ($query as $row){ ?>
                                <tr>  
                                    <td><?php echo $row['descripcion']; ?> </td>      
                                    <td><?php echo $row['recamaras']; ?> </td>      
                                    <td><?php echo $row['banos']; ?> </td>      
                                    <td><?php echo $row['cocheras']; ?> </td>      
                                    <td><?php echo $row['estado']; ?> </td> 
                                    <td><button class="boton-busqueda" onclick = "location.href = 'publicacion.php?id=<?php echo $row['id'] ?>'">Ver Más</button></td>   
                                </tr>
                            
                            </tbody>
                            
                            <?php
                                }
                             ?>
                        </table>
                        </div>
                   
            
            </center>
                    
<!---	<?php
	include("footer.php");
	?>
-->
</body>
</html>
<script type="text/javascript" src="js/bootstrap-filestyle.js"> </script>
<script>
$( "#perfil" ).submit(function( event ) {
  $('.guardar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/editar_perfil.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax").html(datos);
			$('.guardar_datos').attr("disabled", false);

		  }
	});
  event.preventDefault();
})





		
</script>

<script>
    function upload_image(){
            
            var inputFileImage = document.getElementById("imagefile");
            var file = inputFileImage.files[0];
            if( (typeof file === "object") && (file !== null) )
            {
                $("#load_img").text('Cargando...');	
                var data = new FormData();
                data.append('imagefile',file);
                
                
                $.ajax({
                    url: "ajax/imagen_ajax.php",        // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: data, 			  // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData:false,        // To send DOMDocument or non processed data file it is set to false
                    success: function(data)   // A function to be called if request succeeds
                    {
                        $("#load_img").html(data);
                        
                    }
                });	
            }
            
            
        }

    <footer>
        <a href="/">ola</a>
    </footer>
    </body>

</html>