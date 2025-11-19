<?php
include 'conexion.php';
session_start();

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

$sql = "SELECT * FROM administradores WHERE correo = '$correo'";
$result = mysqli_query($conexion, $sql);

if (mysqli_num_rows($result) > 0) {
    $admin = mysqli_fetch_assoc($result);

    // Si las contraseñas están en texto plano, usa ==
    // Si están encriptadas, usa password_verify()
    if ($contrasena == $admin['contrasena']) {
        $_SESSION['admin'] = $admin['nombre'];
        echo "<script>alert('Bienvenido administrador');window.location='gestion.html';</script>";
    } else {
        echo "<script>alert('Contraseña incorrecta');window.history.back();</script>";
    }
} else {
    echo "<script>alert('Correo no registrado');window.history.back();</script>";
}
?>