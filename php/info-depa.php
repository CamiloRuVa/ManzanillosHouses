<?php

include 'connect.php';

$sql='SELECT id FROM publicaciones where tipo = "departamento"
    ORDER BY RAND()
    LIMIT 1';
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_row($query);
$id_principal = $row[0];


$sql2 = "SELECT id,id_usuario,tipo,direccion,descripcion,recamaras,banos,cocheras,estado,precio FROM publicaciones where id = $id_principal and tipo = 'departamento'";
$query2 = mysqli_query($conn,$sql2);
$row2 = mysqli_fetch_row($query2);
$id_depa = $row2[0];
$id_usu_depa = $row2[1];
$tipo_depa = $row2[2];
$precio_depa = $row2[9];

$sql2 = "SELECT nombre,apellidos,id FROM usuarios WHERE id = $id_usu_depa";
$query2 = mysqli_query($conn,$sql2);
$row2 = mysqli_fetch_row($query2);
$nombre_depa = $row2[0];
$apellidos_depa = $row2[1];

$directorio = 'img/img_casas/'.$id_depa.'/';
$ficheros1  = scandir($directorio);
$principal = $ficheros1[2];

$img_depa = 'img/img_casas/'.$id_depa.'/'.$principal.'';


?>