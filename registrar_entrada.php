<?php
include 'conexion.php'; // tu archivo de conexión

$matricula = $_POST['matricula'];

//  Buscar datos del alumno
$buscarAlumno = "SELECT * FROM alumnos WHERE matricula = '$matricula'";
$resultAlumno = mysqli_query($conexion, $buscarAlumno);

if (mysqli_num_rows($resultAlumno) == 0) {
    echo "<script>alert('Matrícula no encontrada en la base de datos de alumnos');window.location='inicio_sesion.php';</script>";
    exit;
}

$alumno = mysqli_fetch_assoc($resultAlumno);
$nombre = $alumno['nombre'];
$carrera = $alumno['carrera'];
$sexo = $alumno['sexo'];

// Revisar si el alumno ya tiene una entrada sin salida
$buscarRegistro = "SELECT * FROM registros WHERE matricula = '$matricula' AND hora_salida IS NULL";
$resultRegistro = mysqli_query($conexion, $buscarRegistro);

if (mysqli_num_rows($resultRegistro) > 0) {
    // Registrar salida
    $update = "UPDATE registros 
               SET hora_salida = NOW() 
               WHERE matricula = '$matricula' AND hora_salida IS NULL";
    if (mysqli_query($conexion, $update)) {
        echo "<script>alert('Salida registrada correctamente.');window.location='index.php';</script>";
    } else {
        echo "<script>alert('Error al registrar salida.');window.location='index.php';</script>";
    }
} else {
    //  Registrar nueva entrada
    $insert = "INSERT INTO registros (matricula, nombre, carrera, sexo, hora_entrada)
               VALUES ('$matricula', '$nombre', '$carrera', '$sexo', NOW())";
    if (mysqli_query($conexion, $insert)) {
        echo "<script>alert('Entrada registrada correctamente.');window.location='index.php';</script>";
    } else {
        echo "<script>alert('Error al registrar entrada.');window.location='index.php';</script>";
    }
}
?>
