<?php

include("conexion.php");


$matricula = $_POST['matricula'];
$nombre = $_POST['nombre'];
$carrera = $_POST['carrera'];


$sql = "UPDATE alumnos 
        SET matricula='$matricula',nombre='$nombre', carrera='$carrera' 
        WHERE matricula='$matricula'";

if (mysqli_query($conexion, $sql)) {
    echo "<script>alert('Datos actualizados correctamente');window.location='gestionar_alumnos.php';</script>";
} else {
    echo "<script>alert('Error al actualizar');window.history.back();</script>";
}
?>
