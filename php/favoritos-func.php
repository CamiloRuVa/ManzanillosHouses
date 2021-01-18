<?php
include 'connect.php';

$id = $_SESSION['init'][0];

$sql = "SELECT * FROM favoritos WHERE id_usuario = '$id'";
$query = mysqli_query($conn,$sql);



?>
