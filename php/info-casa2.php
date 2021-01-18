<?php

include 'connect.php';

$sql='SELECT id FROM publicaciones where tipo = "casa" and estado="venta"
    ORDER BY RAND()
    LIMIT 1';
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_row($query);
$id_principal = $row[0];


$sql2 = "SELECT id,id_usuario,tipo,direccion,descripcion,recamaras,banos,cocheras,estado,precio FROM publicaciones where id = $id_principal and tipo = 'casa' and estado = 'venta'";
$query2 = mysqli_query($conn,$sql2);
$row2 = mysqli_fetch_row($query2);
$id_casa = $row2[0];
$id_usu = $row2[1];
$tipo = $row2[2];
$precio = $row2[9];

$sql2 = "SELECT nombre,apellidos,id FROM usuarios WHERE id = $id_usu";
$query2 = mysqli_query($conn,$sql2);
$row2 = mysqli_fetch_row($query2);
$nombre = $row2[0];
$apellidos = $row2[1];

$directorio = 'img/img_casas/'.$id_casa.'/';
$ficheros1  = scandir($directorio);
$principal = $ficheros1[2];

$img_casas = 'img/img_casas/'.$id_casa.'/'.$principal.'';


?>