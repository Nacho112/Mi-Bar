<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario-Admin</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

    <?php
        include_once 'conexion.php';

        $bd = new connection();
        $conex = $bd->conectar();

        session_start();

        if($_SESSION['cuenta'] == 'admin'){
            echo 'Bienvenido Admin';
        }else{
            header("Location: ../../index.php");
        }

        if(!empty($_GET['borrar'])){
            $id = $_GET['borrar'];
            $sql = "DELETE FROM menumañana WHERE id='$id'";
            $result = $conex->query($sql);
        }

        if($_GET['id']){
            $id = $_GET['id'];
            $sql = "DELETE FROM menumañana WHERE id='$id'";
            $result = $conex->query($sql);
            $nombre = $_GET['nombre'];
            $precio = $_GET['precio'];
            $tipo = $_GET['tipo'];
            $turno = $_GET['turno']; 
        }

    ?>

    <body>
        
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Menu
                </div>
                <div class="card-body">
                    <form action="formulario.php" method="POST" enctype="multipart/form-data">

                        <div class = "form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" required class="form-control" name="nombre" id="nombre" placeholder="nombre..." value="<?php echo $nombre;?>">
                        </div>

                        <input type="radio" id="comida" name="tipo" value="Comida" <?php echo ($tipo=="Comida")?"checked":""; ?>>
                        <label for="Manaña">Comida</label><br>
                        <input type="radio" id="bebida" name="tipo" value="Bebida" <?php echo ($tipo=="Bebida")?"checked":""; ?>>
                        <label for="Manaña">Bebida</label><br>
                        <input type="radio" id="postre" name="tipo" value="Postre" <?php echo ($tipo=="Postre")?"checked":""; ?>>
                        <label for="Manaña">Postre</label><br>

                        <div class = "form-group">
                            <label for="precio">Precio:</label>
                            <input type="text" required class="form-control" name="precio" id="precio" placeholder="precio..." value="<?php echo $precio;?>">
                        </div>

                        <div class = "form-group"> 
                            <label for="txt">Imagen:</label> <br> 
                            <input type="file" class="form-control" name="img" id="img" placeholder="Imagen...">
                        </div>

                        <input type="radio" id="Manaña" name="turno" value="Manaña" <?php echo ($turno=="Mañana")?"checked":""; ?>>
                        <label for="Manaña">Manaña</label><br>
                        <input type="radio" id="Tarde" name="turno" value="Tarde" <?php echo ($turno=="Tarde")?"checked":""; ?>>
                        <label for="Tarde">Tarde</label><br>

                        <div class="btn-group" role="group" aria-label="">
                            <button type="submit" name="accion" value="1"        class="btn btn-success">Guardar Cambios</button>
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

        <div class="col-md-7">
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
                                <input type="submit" value="Logout" name="logout">
                            </form>
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <?php while($comida = $consulta->fetch_array(MYSQLI_BOTH)){ 
                        echo '
                        <tr>
                            <td>'.$comida['id'].'</td>
                            <td>'.$comida['nombre'].'</td>
                            <td>'.$comida['tipo'].'</td>
                            <td>'.$comida['precio'].'</td>
                            <td><img width="90" src=http://localhost/MiBar/Uploads/'.$comida['imagen'].'></td>
                            <td>'.$comida['turno'].'</td>
                            <td>
                                <a href="'.$comida['id'].'"><button type="button" class="btn btn-primary">Modificar</button></a>
                                <a href="http://localhost/MiBar/Admin/basedatos/formulario.php?borrar='.$comida['id'].'"><button type="button" class="btn btn-danger">Borrar</button></a>
                            </td>
                        </tr>';
                    }?>

                </tbody>

            </table>
        </div>

    </body>
</html>