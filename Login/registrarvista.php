<?php

include '../Admin/basedatos/conexion.php';

if($_POST){

    $conec = connection::conectar(); 

    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    $result =  $conec->query("INSERT INTO usuarios VALUES (NULL, '$usuario', '$contraseña', 0)");
    
    print_r($result);
}

?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <title></title> 
        <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
        <link rel="stylesheet" href="style.css">
        

    </head>  

    <body>

        <form method="POST" class="formulario" action="registrarvista.php">

            <h1>Registrate</h1>
            <div class="contenedor">
            
                <div class="input-contenedor">

                    <i class="fas fa-user icon"></i>
                    <input type="text" placeholder="Usuario" name="usuario">
                    
                </div>
                    
                <div class="input-contenedor">

                    <i class="fas fa-key icon"></i>
                    <input type="password" placeholder="Contraseña" name="contraseña">
                    
                </div>

                <input type="submit" value="Registrate" class="button">
                <p>Al registrarte, aceptas nuestras Condiciones de uso y Política de privacidad.</p>
                <p>¿Ya tienes una cuenta?<a class="link" href="loginvista.php">Iniciar Sesion</a></p>

            </div>
        </form>
    </body>
</html>