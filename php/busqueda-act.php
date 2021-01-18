<?php
include 'connect.php';

$tipo = $_GET['tipo'];
$estado = $_GET['estado'];
$recamaras = $_GET['recamaras'];


$sql = "SELECT * from publicaciones WHERE tipo = '$tipo' and estado = '$estado' and recamaras = $recamaras";
$query = mysqli_query($conn,$sql);
$array = mysqli_fetch_array($query);


/*foreach ($query as $row){
    
    $desc = $row['descripcion'];       
    $rec = $row['recamaras'];       
    $banos = $row['banos'];       
    $cocheras = $row['cocheras'];       
    $estado = $row['estado'];
    



}*/


?>