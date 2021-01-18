<?php
include 'connect.php';

$correo = $_POST['correo'];
$contraseña = $_POST['con'];

$sql = "Select contra,id,nombre,img_perfil FROM usuarios WHERE correo='$correo'";

$consulta = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($consulta);
$comcon = $row[0];
$id = $row[1];
$nombre = $row[2];
$img_perfil = $row[3];

if(!$sql){
    die("Correo no Existe");
}
   
if(!password_verify($contraseña,$comcon)){
    die("Falló");
}

if($_POST['guardar_clave'] == "1"){
    $numero_al = mt_rand(100000000,999999999);
    $sql2 = "UPDATE usuarios set num_acc='$numero_al' where id = '$id'";
    mysqli_query($conn,$sql2);
    setcookie("id_usuario",$id);
    setcookie("num_acc",$numero_al);
}

session_start();
$_SESSION['init'] = array();
$_SESSION['init'][0] = $id;
$_SESSION['init'][1] = $nombre;
$_SESSION['init'][2] = $img_perfil;

if(!isset($_SESSION["init"])){
    echo "Ocurrio un error con la Sesion";
}



header("Location:../index.php");


?>