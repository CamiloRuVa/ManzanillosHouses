<?php

include 'connect.php';



$id_principal = $_GET['id'];

$sql = "SELECT id,id_usuario,tipo,direccion,descripcion,recamaras,banos,cocheras,estado,precio FROM publicaciones where id = $id_principal";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_row($query);
$id_casa = $row[0];
$id_usu = $row[1];
$tipo = $row[2];
$direcc = $row[3];
$desc = $row[4];
$recamaras = $row[5];
$banos = $row[6];
$cocheras = $row[7];
$estado = $row[8];
$precio = $row[9];


$sql2 = "SELECT nombre,apellidos,id,num FROM usuarios WHERE id = $id_usu";
$query2 = mysqli_query($conn,$sql2);
$row2 = mysqli_fetch_row($query2);
$nombre = $row2[0];
$apellidos = $row2[1];
$num = $row2[3];


$directorio = 'img/img_casas/'.$id_casa.'/';
$ficheros1  = scandir($directorio);
$principal = $ficheros1[2];

$img_casas = 'img/img_casas/'.$id_casa.'/'.$principal.'';



?>