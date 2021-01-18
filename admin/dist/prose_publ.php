<?php

    include ("conexion.php");

    $id = $_POST['id'];
    $tipo = $_POST['tipo'];
    $direccion = $_POST['direccion'];
    $descripcion = $_POST['descripcion'];
    $recamaras = $_POST['recamaras'];
    $banos = $_POST['banos'];
    $cocheras = $_POST['cocheras'];
    $estado = $_POST['estado'];
    $precio = $_POST['precio'];

    $actualizar = "UPDATE publicaciones SET tipo='$tipo', direccion='$direccion', descripcion='$descripcion', recamaras='$recamaras', banos='$banos', cocheras='$cocheras', estado='$estado', precio='$precio' WHERE id='$id'";

    $resultado = mysqli_query($mysqli, $actualizar);

    if($resultado){
        echo "<script>alert('Se han actualizado los cambios correctamente, actualiza la pagina para ver los cambios'); window.location='/admin/dist/edit_publ.php';</script>";
    } else{
        echo "<script>alert('No se pudieron actualizar los datos'); window.history.go(-1);</script>";
    }

?>