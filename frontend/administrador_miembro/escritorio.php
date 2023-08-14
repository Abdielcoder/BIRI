<?php
    ob_start();
     session_start();
    
    if(!isset($_SESSION['rol']) || $_SESSION['rol'] != 2){
    header('location: ../login.php');
$id=$_SESSION['id'];
  }
?>


<?php if(isset($_SESSION['id'])) { ?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema Bitacora Rino</title>

  <!-- 
    - favicon
  -->
   <link rel="shortcut icon" href="../../backend/img/ae.png" type="image/png">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="../../backend/css/admin.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">

  <!-- 
    - material icon link
  -->
  <link
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
</head>

<body>

  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>
    <div class="container">

      <h1>
        <a href="escritorio.php" class="logo">Panel</a>
      </h1>

      <button class="menu-toggle-btn icon-box" data-menu-toggle-btn aria-label="Toggle Menu">
        <span class="material-symbols-rounded  icon">menu</span>
      </button>

      <nav class="navbar">
        <div class="container">

          <ul class="navbar-list">

            <li>
              <a href="escritorio.php" class="navbar-link active icon-box">
                <span class="material-symbols-rounded  icon">grid_view</span>

                <span>Inicio</span>
              </a>
            </li>
            
            <li>
              <a href="tareas.php" class="navbar-link icon-box">
                <span class="material-symbols-rounded  icon">list</span>

                <span>Tareas</span>
              </a>
            </li>

            <li>
              <a href="../salir.php" class="navbar-link icon-box">
                <span class="material-symbols-rounded  icon">power_settings_new</span>

                <span>Cerrar sesión</span>
              </a>
            </li>

          </ul>

          <ul class="user-action-list">
            <li>
              <a href="#" class="header-profile">

                <figure class="profile-avatar">
                  <img src="../../backend/img/logorino.png" alt="Elizabeth Foster" width="32" height="32">
                </figure>

                <div>
                  <p class="profile-title"><?php echo $_SESSION['nombre']; ?></p>

                  <?php 
                    if ($_SESSION['rol']=='1') {
                      echo ' <p class="card-subtitle">Administrador</p>';  
                    } elseif ($_SESSION['rol']=='2') {
                      echo ' <p class="card-subtitle">Lider</p>';
                    } 
               ?>
                </div>

              </a>
            </li>

          </ul>

        </div>
      </nav>

    </div>
  </header>

  <main>
    <article class="container article">

      <h2 class="h2 article-title">Hola <?php echo $_SESSION['nombre']; ?></h2>

      <!-- <p class="article-subtitle">Bienvenido a nuestro sistema</p> -->

      <!-- 
        - #HOME
      -->

      <section class="home">

        <div class="card profile-card">
          <div class="profile-card-wrapper">

            <figure class="card-avatar">
              <img src="../../backend/img/logorino.png" alt="admin" width="48" height="48">
            </figure>

            <div>
              <p class="card-title"><?php echo $_SESSION['nombre']; ?></p>

              <?php 
                    if ($_SESSION['rol']=='1') {
                      echo ' <p class="card-subtitle">Administrador</p>';  
                    } elseif ($_SESSION['rol']=='2') {
                      echo ' <p class="card-subtitle">Lider</p>';
                    } 
               ?>
              
            </div>

          </div>

          <ul class="contact-list">

            <li>
              <a href="#" class="contact-link icon-box">
                <span class="material-symbols-rounded  icon">mail</span>

                <p class="text"><?php echo $_SESSION['correo']; ?></p>
              </a>
            </li>

            <li>
              <a href="#" class="contact-link icon-box">
                <span class="material-symbols-rounded  icon">person</span>

                <p class="text"><?php echo $_SESSION['username']; ?></p>
              </a>
            </li>

            <li>
              <a href="#" class="contact-link icon-box">
                <span class="material-symbols-rounded  icon">badge</span>

                <p class="text"><?php echo $_SESSION['nombre']; ?></p>
              </a>
            </li>


            <li>
              <a href="#" class="contact-link icon-box">
                <span class="material-symbols-rounded  icon">tenancy</span>

                <?php 
                    if ($_SESSION['rol']=='1') {
                      echo ' <p class="card-subtitle">Administrador</p>';  
                    } elseif ($_SESSION['rol']=='2') {
                      echo ' <p class="card-subtitle">Lider</p>';
                    } 
               ?>
              </a>
            </li>

            <li>
              <a href="#" class="contact-link icon-box">
                <span class="material-symbols-rounded  icon">scatter_plot</span>

                <?php 
                    if ($_SESSION['state']=='1') {
                      echo ' <p class="card-subtitle">Activo</p>';  
                    } elseif ($_SESSION['rol']=='2') {
                      echo ' <p class="card-subtitle">Inactivo</p>';
                    } 
               ?>
              </a>
            </li>

          </ul>
        </div>

        <div class="card-wrapper">

          <div class="card task-card">

            <div class="card-icon icon-box green">
              <span class="material-symbols-rounded  icon">task_alt</span>
            </div>

            <div>
              <?php 
                  require_once('../../backend/config/Conexion.php');
                    $sql = "SELECT COUNT(*) total FROM tarea WHERE state = 1";
                    $result = $connect->query($sql); //$pdo sería el objeto conexión
                    $total = $result->fetchColumn();

              ?>
              <data class="card-data" value="<?php echo  $total; ?>"><?php echo  $total; ?></data>

              <p class="card-text">Tareas atendidas</p>
            </div>

          </div>

          <div class="card task-card">

            <div class="card-icon icon-box red">
              <span class="material-symbols-rounded  icon">sort</span>
            </div>

            <div>
              <?php 
                
                    $sql = "SELECT COUNT(*) total FROM tarea WHERE state = 0";
                    $result = $connect->query($sql); //$pdo sería el objeto conexión
                    $total = $result->fetchColumn();

              ?>
              <data class="card-data" value="<?php echo  $total; ?>"><?php echo  $total; ?></data>

              <p class="card-text">Tareas pendientes</p>
            </div>

          </div>

     

      

            <div>
              <?php 
                
                    $sql = "SELECT COUNT(*) total FROM tarea WHERE state = 0";
                    $result = $connect->query($sql); //$pdo sería el objeto conexión
                    $total = $result->fetchColumn();

                    $sql2 = "SELECT COUNT(*) total FROM tarea WHERE state = 1";
                    $result2 = $connect->query($sql2); //$pdo sería el objeto conexión
                    $total2 = $result2->fetchColumn();
                    $sumaTotales = $total+$total2;
                    $porcentajeAtencion = $total*100/$sumaTotales;
                    $porcentajePendiente = $total2*100/$sumaTotales
              ?>
             
            </div>

          </div>

        </div>

        <div class="card revenue-card">

          <button class="card-menu-btn icon-box" aria-label="More" data-menu-btn>
            <span class="material-symbols-rounded  icon">more_horiz</span>
          </button>

          <ul class="ctx-menu">
            <li class="ctx-item">
              <button class="ctx-menu-btn icon-box">
                <span class="material-symbols-rounded  icon" aria-hidden="true">cached</span>

                <span class="ctx-menu-text">Refresh</span>
              </button>
            </li>

          </ul>
         
          <p class="card-title">Tareas</p>
<?php      
      $sql = "SELECT COUNT(*) total FROM tarea";
      $result = $connect->query($sql); //$pdo sería el objeto conexión
      $total = $result->fetchColumn();
?>

          <data class="card-price" value="<?php echo  $total; ?>"><?php echo  $total; ?></data>

          <p class="card-text">Last Week</p>

          <div class="divider card-divider"></div>

          <ul class="revenue-list">

            <li class="revenue-item icon-box">

              <span class="material-symbols-rounded  icon  green">trending_up</span>

              <div>
                <?php           
    $sql = "SELECT COUNT(*) total FROM tarea WHERE state = 1";
    $result = $connect->query($sql); //$pdo sería el objeto conexión
    $total = $result->fetchColumn();
    $decimalPendientes = number_format($porcentajePendiente,2);
?>
                <data class="revenue-item-data" value="<?php echo  $decimalPendientes; ?>"><?php echo  $decimalPendientes; ?>%</data>

                <p class="revenue-item-text">Atendidas</p>
              </div>

            </li>

            <li class="revenue-item icon-box">

              <span class="material-symbols-rounded  icon  red">trending_down</span>

              <div>
                <?php           
    $sql = "SELECT COUNT(*) total FROM tarea WHERE state = 0";
    $result = $connect->query($sql); //$pdo sería el objeto conexión
    $total = $result->fetchColumn();
    $decimalAtencion = number_format($porcentajeAtencion,2)
?>
                <data class="revenue-item-data" value="<?php echo  $decimalAtencion; ?>"><?php echo  $decimalAtencion; ?>%</data>

                <p class="revenue-item-text">Pendientes</p>
              </div>

            </li>

          </ul>

        </div>

      </section>
      <!-- 
        - #PROJECTS
      -->
      <section class="projects">

        <div class="section-title-wrapper">
          <h2 class="section-title">Tareas Pendientes</h2>

          <button class="btn btn-link icon-box" onclick="location.href='../tareas/mostrar.php'">
            <span>Ver todas</span>

            <span class="material-symbols-rounded  icon" aria-hidden="true">arrow_forward</span>
          </button>
        </div>

        <ul class="project-list">
        <?php 
        $nombre = $_SESSION['nombre'];
$sentencia = $connect->prepare("SELECT * FROM tarea where nomcl='$nombre'  ORDER BY idtarea DESC;");
 $sentencia->execute();
$data =  array();
if($sentencia){
  while($r = $sentencia->fetchObject()){
    $data[] = $r;
  }
}
     ?>
     <?php if(count($data)>0):?>
      <?php foreach($data as $d):?>
        
         <?php 
                if ($d->state ==0 and $d->nomcl==$nombre) {
                  echo '
                  <li class="project-item">
                  <div class="card project-card">
      
                    <button class="card-menu-btn icon-box" aria-label="More" data-menu-btn>
                      <span class="material-symbols-rounded  icon">more_horiz</span>
                    </button>
      
                    <ul class="ctx-menu">
                  <a href="tel:'.$d->celu.'">
                <li class="ctx-item">
                  <button class="ctx-menu-btn red icon-box">
                    <span class="material-symbols-rounded  icon" aria-hidden="true">smartphone</span>

                    <span class="ctx-menu-text">Llamar</span>
                  </button>
                </li>
                </a>
                <a href="attend.php?id='.$d->idtarea.'">
                <li class="ctx-item">
                  <button class="ctx-menu-btn red icon-box">
                    <span class="material-symbols-rounded  icon" aria-hidden="true">gpp_maybe</span>

                    <span class="ctx-menu-text">Atender</span>
                  </button>
                </li>
                </a>
                </ul>';
                echo '<time class="card-date" datetime="2022-04-09">' . $d->dia . '</time> <h3 class="card-title">';

                echo ' <a href="attend.php?id='.$d->idtarea.'">' . $d->nomcas . '</a></h3>';

                } elseif ($d->state ==1) {
                //   echo '<li class="divider"></li>
                // <a href="../tareas/view.php?id='.$d->idtarea.'">
                // <li class="ctx-item">
                //   <button class="ctx-menu-btn  icon-box">
                //     <span class="material-symbols-rounded  icon" aria-hidden="true">check</span>

                //     <span class="ctx-menu-text">Ver</span>
                //   </button>
                // </li>
                // </a>';
                }
               ?>
             
             
              <?php 
                if ($d->state ==0) {
                  echo '<div class="card-badge red">Estado: Pendiente</div>';
                  echo '<div class="card-badge gray">Asignado: ' . $d->apecl . '</div>';
                } elseif ($d->state ==1) {
                  // echo '<div class="card-badge green">Atendido</div>';
                }
               ?>
<!-- 
              <p class="card-text">
                <?php echo $d->sitio ?>
              </p> -->
            </div>
          </li>
<?php endforeach; ?>
          <?php else:?>
                           <div class="alert">
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
      <strong>Danger!</strong> No hay datos.
    </div>
    <?php endif; ?>

        </ul>

      </section>
<div></div>
<div></div>
      <table id="miTabla" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th class="text-center">Levanto</th>
            <th class="text-center">Atendio</th>
            <th class="text-center">Incidencia</th>
            <th class="text-center">Departamento</th>
            <th class="text-center">Estado</th>
            <th class="text-center">Fecha Inicio</th>
            <th class="text-center">Fecha Fin</th>
            <th class="text-center">Tiempo atención</th>
            <th class="text-center">Atender</th>
            <!-- <th class="text-center">Contraseña</th> -->
        </tr>
    </thead>
    <tbody>
        <?php
        // Datos de conexión a la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "incidencias";

        // Crear una conexión a la base de datos
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Consulta para obtener los datos de la tabla "tareas"
        $sql = "SELECT * FROM tarea where nomcl='$nombre'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Mostrar datos de cada fila
            while ($row = $result->fetch_assoc()) {
              $fechaIncio = $row["dia"]; // Tu fecha y hora en formato año-mes-día hora:minuto:segundo
              $timestampInicio = strtotime($fechaIncio);
              $fechaHoraFormateadaInicio = formatearFechaHora($timestampInicio);
            
              $fechaFin = $row["fere"]; // Tu fecha y hora en formato año-mes-día hora:minuto:segundo
              $timestampFin = strtotime($fechaFin);
              $fechaHoraFormateadaFinal = formatearFechaHora($timestampFin);
            
               
              $timestamp1 = strtotime($fechaIncio);
              $timestamp2 = strtotime($fechaFin);
              
              // Calcula la diferencia en segundos
              $diferenciaSegundos = abs($timestamp2 - $timestamp1);

              // Calcula los días
              $dias = floor($diferenciaSegundos / (60 * 60 * 24));

              // Calcula las horas
              $horas = floor(($diferenciaSegundos - ($dias * 60 * 60 * 24)) / (60 * 60));

              // Calcula los minutos
              $minutos = floor(($diferenciaSegundos - ($dias * 60 * 60 * 24) - ($horas * 60 * 60)) / 60);

              // Calcula los segundos
              $segundos = $diferenciaSegundos - ($dias * 60 * 60 * 24) - ($horas * 60 * 60) - ($minutos * 60);

              if($fechaHoraFormateadaFinal == '01 de enero de 1970 01:00:00'){
                $fechaHoraFormateadaFinal= '';
                $tiempoTranscurrido =  "<td></td> ";
                $atenderIncidencia = '<td><a href="attend.php?id='.$row['idtarea'].'">
                <li class="ctx-item">
                  <button class="ctx-menu-btn red icon-box">
                    <span class="material-symbols-rounded  icon" aria-hidden="true">gpp_maybe</span>

                    <span class="ctx-menu-text">Atender</span>
                  </button>
                </li>
                </a></td>';
                }else{
                  $atenderIncidencia = '<td style="text-aling:center;padding-left:30px">
                <li class="ctx-item">
                  <button class="ctx-menu-btn yellow icon-box">
                    <span style="font-size:37px;text-aling:center;color:green;" class="material-symbols-rounded  icon" aria-hidden="true">done</span>

                    
                  </button>
                </li>
                </td>';
                  if($horas<2){
                    $tiempoTranscurrido = "<td style='background-color:green;color:white'>Días: $dias, Horas: $horas, Minutos: $minutos</td>";

                  }
                  if($horas==3){
                    $tiempoTranscurrido = "<td style='background-color:yellow;color:black'>Días: $dias, Horas: $horas, Minutos: $minutos</td>";

                  }
                  if($horas>3){
                    $tiempoTranscurrido = "<td style='background-color:red;color:white'>Días: $dias, Horas: $horas, Minutos: $minutos</td>";

                  }

                }
                echo "<tr>";
                echo "<td>" . $row["nomcl"] . "</td>";
                echo "<td>" . $row["apecl"] . "</td>";
                echo "<td>" . $row["nomcas"] . "</td>";
                echo "<td>" . $row["sitio"] . "</td>";
                if($row["state"] == 0){ echo "<td style='color: red'> PENDIENTE</td>";}
                else{ echo "<td style='color: green'>FINALIZADO</td>";};
                echo "<td>" . $fechaHoraFormateadaInicio . "</td>";
                echo "<td>" . $fechaHoraFormateadaFinal . "</td>";
                echo $tiempoTranscurrido;
                echo $atenderIncidencia;
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No hay tareas disponibles.</td></tr>";
        }
        // Cerrar la conexión
        $conn->close();
        ?>
    </tbody>
</table>
    </article>
  </main>

  <footer class="footer">
    <div class="container">

    

      <p class="copyright">
        &copy; <?php echo date("Y"); ?> <a href="#" class="copyright-link">Rino Risk</a>. Todos los derechos reservados
      </p>

    </div>
  </footer>

  <!-- 
    - custom js link
  -->
  <script src="../../backend/js/script.js"></script>

</body>

</html>
<?php }else{ 
    header('Location: ../login.php');
 } ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#miTabla').DataTable();
        });
    </script>
<script>

<?php 
  function formatearFechaHora($timestamp) {
    $meses = array(
        1 => 'enero', 2 => 'febrero', 3 => 'marzo', 4 => 'abril', 5 => 'mayo', 6 => 'junio',
        7 => 'julio', 8 => 'agosto', 9 => 'septiembre', 10 => 'octubre', 11 => 'noviembre', 12 => 'diciembre'
    );

    $dia = date('d', $timestamp);
    $mes = $meses[date('n', $timestamp)];
    $anio = date('Y', $timestamp);
    $hora = date('H:i:s', $timestamp);

    return "$dia de $mes de $anio $hora";
}?>