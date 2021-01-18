<?php

    include ("conexion.php");

    $id = $_POST['id_super'];
    $usuario = $_POST['usuario'];
    $nombre = $_POST['nombre2'];
    

    $actualizar = "UPDATE admins SET usuario='$usuario', nombre='$nombre' WHERE id='$id'";

    $resultado = mysqli_query($mysqli, $actualizar);

    if($resultado){
        echo "<script>alert('Se han actualizado los cambios correctamente, actualiza la pagina para ver los cambios'); window.location='/admin/dist/edicion2.php';</script>";
    } else{
        echo "<script>alert('No se pudieron actualizar los datos'); window.history.go(-1);</script>";
    }

?>