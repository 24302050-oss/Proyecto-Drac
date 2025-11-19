<?php
include 'conexion.php';

$matricula = $_POST['matricula'];

$sql = "DELETE FROM alumnos WHERE matricula='$matricula'";

if (mysqli_query($conexion, $sql) && mysqli_affected_rows($conexion) > 0) {
    echo "<script>alert('Alumno eliminado correctamente');window.location='eliminarregistros.php';</script>";
} else {
    echo "<script>alert('No se encontró la matrícula o no se pudo eliminar');window.history.back();</script>";
}
?>
