<?php

    include ("conexion.php");

    $id = $_GET['id'];
    $eliminar = "DELETE FROM usuarios WHERE id='$id'";

    $resultado = mysqli_query($mysqli, $eliminar);

    if($resultado){
        header("Location: tables.php");
    } else{
        echo "<script>alert('No se pudo eliminar'); window.history.go(-1);</script>";
    }

?>