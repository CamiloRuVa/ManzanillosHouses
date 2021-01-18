<?php

    include ("conexion.php");

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $nacimiento = $_POST['nacimiento'];
    $correo = $_POST['correo'];

    $actualizar = "UPDATE usuarios SET nombre='$nombre', nacimiento='$nacimiento', correo='$correo' WHERE id='$id'";

    $resultado = mysqli_query($mysqli, $actualizar);

    if($resultado){
        echo "<script>alert('Se han actualizado los cambios correctamente, actualiza la pagina para ver los cambios'); window.location='/admin/dist/edicion.php';</script>";
    } else{
        echo "<script>alert('No se pudieron actualizar los datos'); window.history.go(-1);</script>";
    }

?>