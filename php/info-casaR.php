<?php

include 'connect.php';

$sql='SELECT id FROM publicaciones WHERE estado = "renta" AND tipo = "casa"
    ORDER BY RAND()
    LIMIT 1';
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_row($query);
$id_principal = $row[0];


$sql2 = "SELECT id,id_usuario,tipo,direccion,descripcion,recamaras,banos,cocheras,estado,precio FROM publicaciones where id = $id_principal and tipo = 'casa' and estado = 'renta'";
$query2 = mysqli_query($conn,$sql2);
$row2 = mysqli_fetch_row($query2);
$id_casaR = $row2[0];
$id_usuR = $row2[1];
$tipoR = $row2[2];
$precioR = $row2[9];

$sql2 = "SELECT nombre,apellidos,id FROM usuarios WHERE id = $id_usuR";
$query2 = mysqli_query($conn,$sql2);
$row2 = mysqli_fetch_row($query2);
$nombreR = $row2[0];
$apellidosR = $row2[1];

$directorio = 'img/img_casas/'.$id_casaR.'/';
$ficheros1  = scandir($directorio);
$principal = $ficheros1[2];

$img_casasR = 'img/img_casas/'.$id_casaR.'/'.$principal.'';


?>