<?php

include 'conexion.php';

$bd = new connection();
$conex = $bd->conectar();

$usuario     = $_POST['usuario'];
$contraseña = $_POST['contraseña'];

$q = "SELECT * FROM usuarios where usuario='$usuario' and contraseña='$contraseña'";
$result = mysqli_query($conex, $q);

if ($result && $usuario == 'admin' && $contraseña == '12345') {
    session_start();
    $_SESSION['user'] = $user;
    header("Location: formulario.php");
}

?>