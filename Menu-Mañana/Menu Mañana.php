<?php
  include_once '../Admin/basedatos/conexion.php';

  $conexion = new connection();
  $db = $conexion->conectar();

  setcookie("cookieNombre", "", time() + 3600, "/", "http://localhost/MiBar/", 1);

  $iniciar = ($_GET['pagina']-1)*8;

  if(empty($_COOKIE['cookiebusqueda'])||$_COOKIE['cookiebusqueda']<=0){
  
    if($_GET['pagina']){
      if($_GET['pagina']<=0){
        header("Location: http://localhost/MiBar/Menu-Ma%C3%B1ana/Menu%20Ma%C3%B1ana.php?pagina=1"); 

      }else{
        $q = "SELECT * FROM menumañana WHERE turno='Mañana' LIMIT $iniciar,7";
      }
    }

  }else{
    $cookie = $_COOKIE['cookiebusqueda'];

    if($_GET['pagina']){
      if($_GET['pagina']<=0){
        header("Location: http://localhost/MiBar/Menu-Ma%C3%B1ana/Menu%20Ma%C3%B1ana.php?pagina=1"); 
      }else{
        $q = "SELECT * FROM menumañana WHERE nombre LIKE '%$cookie%' LIMIT $iniciar,8;";
      }
    }

    //unset($_COOKIE['cookiebusqueda']);
    setcookie("cookieNombre", "", time() + 3600, "/", "http://localhost/MiBar/", 1);
  }
  
  if(empty($q)){
    header("Location: http://localhost/MiBar/Menu-Ma%C3%B1ana/Menu%20Ma%C3%B1ana.php?pagina=1");
  }

  $consulta = $db->query($q);
  
  if($consulta->num_rows<=0){
    echo '<script type="text/javascript">';
    echo ' alert("No se encontraron mas Datos")'; 
    echo '</script>';
  }

  $total_articulos_db = $consulta->num_rows;
  $paginas = $total_articulos_db/4;
  $paginas = ceil($paginas);
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Menu Mañana</title>
  </head>

  <body>
    <div class="titulo"><h1>MENU DE MAÑANA</h1><br>(Cafe, Medialunas, Licuado)</div>
    <div class="img">
      <input type="text" name="buscar" value="" placeholder="Ingrese palabra clave..." onchange="busqueda(this.value)">
      <button><a href="../index.php">Inicio</a></button>
      <div class="main">
        <div class="menus">
          <?php
            while ($menumañana = $consulta->fetch_array(MYSQLI_BOTH)){
              echo '
                <div class="single-menu">
                  <img src="http://localhost/MiBar/Uploads/'.$menumañana['imagen'].'" alt="">
                  <div class="menu-content">
                    <h5>'.$menumañana['nombre'].'<span>$'.$menumañana['precio'].'</span></h5>
                  </div>
                </div>
              ';    
            }
          ?>
        </div>

        <nav aria-label="Page navigation example"> <!--PAGINACION-->
          <ul class="pagination">

              <li class="page-item <?php echo $_GET['pagina']<=1? 'disabled' : '' ?>">
                  <a class="page-link" href="Menu Mañana.php?pagina=<?php echo $_GET['pagina']-1 ?>">
                      Previous
                  </a>
              </li>

              <?php for ($i=0; $i<$paginas; $i++): ?>
              <li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?>">
                  <a class="page-link" href="Menu Mañana.php?pagina=<?php echo $i+1 ?>">
                      <?php echo $i+1 ?>
                  </a>
              </li>
              <?php endfor ?>
              
              <li class="page-item <?php echo $_GET['pagina']>=$paginas? 'disabled' : '' ?>">
                  <a class="page-link" href="Menu Mañana.php?pagina=<?php echo $_GET['pagina']+1 ?>">
                      Next
                  </a>
              </li>

          </ul>
        </nav>

      </div>
    </div> <!--DIV IMAGEN-->
    <script src="script.js"></script>
  </body>
</html>