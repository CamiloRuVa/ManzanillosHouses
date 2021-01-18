<?php
require "connect.php";
session_start();

$estado = $_POST['estado'];
$ubicacion = $_POST['ubicacion'];
$descripcion = $_POST['descripcion'];
$banos = $_POST['banos'];
$cuartos = $_POST['cuartos'];
$cocheras = $_POST['cocheras'];

$tipo = $_POST['tipo']; 
$precio = $_POST['precio']; 
$usuario = $_SESSION['init'][0];

//$sql = "DELETE FROM img_nombre WHERE id = 1";
mysqli_query($conn,$sql);

$sql1 = "INSERT INTO publicaciones(id_usuario,descripcion,direccion,recamaras,banos,cocheras,estado,precio,tipo) VALUES($usuario,'$descripcion','$ubicacion',$cuartos,$banos,$cocheras,'$estado',$precio,'$tipo')";
if(!mysqli_query($conn,$sql1)){
	die("Error consulta 1");
}

	$rs = mysqli_query($conn,"SELECT MAX(id) AS id FROM publicaciones");
	if ($row = mysqli_fetch_row($rs)) {
	$id_publi = trim($row[0]);
	}

	foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name)
	{
		if($_FILES["archivo"]["name"][$key]) {
			$filename = $_FILES["archivo"]["name"][$key]; 
			$source = $_FILES["archivo"]["tmp_name"][$key];
			
			//$directorio = '../img/img_casas/'.$usuario.'/'.$id_publi.'';
			$directorio = '../img/img_casas/'.$id_publi.'';  
			
			$sql2 = "INSERT INTO img_nombre(id,nombre)VALUES($usuario,'$filename');";
			
			if(!mysqli_query($conn,$sql2)){
				die("Error en la consulta 2");
			}
			if(!file_exists($directorio)){
				mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");	
			}
			
			$dir=opendir($directorio); 
			$target_path = $directorio.'/'.$filename;
			
			if(move_uploaded_file($source, $target_path)) {	
				echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
				} else {	
				echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
			}
			closedir($dir);
		}
	}
	
	header("Location:../index.php");
?>