<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario-Admin</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

    <?php

        include_once 'conexion.php';

        $bd = new connection();
        $conex = $bd->conectar();

        session_start();

        if($_SESSION['cuenta'] == 'admin'){
        }else{
            header("Location: ../../index.php");
        }

        if(!empty($_GET['borrar'])){
            $id = $_GET['borrar'];
            $sql = "DELETE FROM menumañana WHERE id='$id'";
            $result = $conex->query($sql);
        }

        if($_POST){

            if(isset($_POST['logout'])){
                session_destroy();
                header("Location: ../../index.php");
            }

            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $variable = (int)$_POST['accion'];
            $turno = $_POST['turno'];

            switch ($turno) {
                case 'Mañana': $turno = "Mañana"; break;
                case 'Tarde' :$turno = "Tarde"; break;
                default:$turno="Mañana";break;
            }

            $tipo = $_POST['tipo'];
            $target_dir = "../../Uploads/"; //donde se van los archivos
            $target_file = $target_dir . basename($_FILES["img"]["name"]);
            move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
            $imagen = $_FILES["img"]["name"];

            switch ($variable) {

                case 1:
                        $sql = "INSERT INTO menumañana (nombre, tipo, turno, precio, imagen) VALUES ('$nombre', '$tipo', '$turno', '$precio', '$imagen')";  
                        $result = $conex->query($sql);
                    break;

                case 2:
                        $sql = "UPDATE menumañana SET nombre='$nombre', precio='$precio', imagen='$imagen' WHERE id='$id'";
                    break;

                case 4:
                        $sql = "SELECT * FROM menumañana";
                    break;

                default:
                  # code...
                    break;
            }
        }
        ?>

    <body>
        
        <div class="primera col-md-3">
            <div class="card">
                <div class="card-header">Menu</div>
                <div class="card-body">
                    <form action="formulario.php" method="POST" enctype="multipart/form-data">

                        <div class = "form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" required class="form-control" name="nombre" id="nombre" placeholder="nombre...">
                        </div>

                        <input type="radio" id="comida" name="tipo" value="Comida">
                        <label for="Manaña">Comida</label><br>
                        <input type="radio" id="bebida" name="tipo" value="Bebida">
                        <label for="Manaña">Bebida</label><br>
                        <input type="radio" id="postre" name="tipo" value="Postre">
                        <label for="Manaña">Postre</label><br>

                        <div class = "form-group">
                            <label for="precio">Precio:</label>
                            <input type="text" required class="form-control" name="precio" id="precio" placeholder="precio...">
                        </div>

                        <div class = "form-group"> 
                            <label for="txt">Imagen:</label> <br> 
                            <input type="file" class="form-control" name="img" id="img" placeholder="Imagen...">
                        </div>

                        <input type="radio" id="Manaña" name="turno" value="Manaña">
                        <label for="Manaña">Manaña</label><br>
                        <input type="radio" id="Tarde" name="turno" value="Tarde">
                        <label for="Tarde">Tarde</label><br>

                        <div class="btn-group" role="group" aria-label="">
                            <button type="submit" name="accion" value="1" class="btn btn-success">Agregar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <?php
            include_once 'conexion.php';
            $conexion = new connection();
            $db = $conexion->conectar();
            $q = "SELECT * FROM menumañana";
            $consulta = $db->query($q);
        ?>

        <div class="segunda col-md-6">
            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Precio</th>
                        <th>Img</th>
                        <th>Turno</th>
                        <th>Accion</th>
                        <th>
                            <form method="POST" action="formulario.php">
                                <input type="submit" value="Salida" name="logout">
                            </form>
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <?php while($menumañana = $consulta->fetch_array(MYSQLI_BOTH)){ 
                        echo '
                        <tr>
                            <td>'.$menumañana['id'].'</td>
                            <td>'.$menumañana['nombre'].'</td>
                            <td>'.$menumañana['tipo'].'</td>
                            <td>'.$menumañana['precio'].'</td>
                            <td><img width="90" src=http://localhost/MiBar/Uploads/'.$menumañana['imagen'].'></td>
                            <td>'.$menumañana['turno'].'</td>
                            <td>
                                <a href="http://localhost/MiBar/Admin/basedatos/form-edit.php?id='.$menumañana['id'].'&nombre='.$menumañana['nombre'].'&precio='.$menumañana['precio'].'&turno='.$menumañana['turno'].'&tipo='.$menumañana['tipo'].'"><button type="button" class="btn btn-warning">Modificar</button></a>
                                <a href="http://localhost/MiBar/Admin/basedatos/formulario.php?borrar='.$menumañana['id'].'"><button type="button" class="btn btn-danger">Borrar</button></a>
                            </td>
                        </tr>';
                    }?>

                </tbody>

            </table>
        </div>

    </body>
</html>