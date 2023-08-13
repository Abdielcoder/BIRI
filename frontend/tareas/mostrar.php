<?php
    ob_start();
     session_start();
    
    if(!isset($_SESSION['rol']) || $_SESSION['rol'] != 1){
    header('location: ../login.php');

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


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

</head>

<body>

  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>
    <div class="container">

      <h1>
        <a href="../administrador/escritorio.php" class="logo">Panel</a>
      </h1>

      <button class="menu-toggle-btn icon-box" data-menu-toggle-btn aria-label="Toggle Menu">
        <span class="material-symbols-rounded  icon">menu</span>
      </button>

      <nav class="navbar">
        <div class="container">

          <ul class="navbar-list">

            <li>
              <a href="../administrador/escritorio.php" class="navbar-link  icon-box">
                <span class="material-symbols-rounded  icon">grid_view</span>

                <span>Inicio</span>
              </a>
            </li>

            <li>
              <a href="../miembros/mostrar.php" class="navbar-link  icon-box">
                <span class="material-symbols-rounded  icon">folder</span>

                <span>Miembros</span>
              </a>
            </li>

            <li>
              <a href="../tareas/mostrar.php" class="navbar-link active icon-box">
                <span class="material-symbols-rounded  icon">list</span>

                <span>Tareas</span>
              </a>
            </li>

            <li>
              <a href="../configuracion/mostrar.php" class="navbar-link icon-box">
                <span class="material-symbols-rounded  icon">settings</span>

                <span>Configuración</span>
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
                  <img src="../../backend/img/reere.png" alt="Elizabeth Foster" width="32" height="32">
                </figure>

                <div>
                  <p class="profile-title"><?php echo $_SESSION['nombre']; ?></p>

                  <?php 
                    if ($_SESSION['rol']= '1') {
                      echo '<p class="card-subtitle">Administrador</p>';
                    } else {
                        echo '<p class="card-subtitle">Cliente</p>';
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
    <div class="section-title-wrapper">
    
    <button class="btn-group" style="cursor: pointer;" data-toggle="modal" data-target="#myModal">Nueva incidencia</button>
</div>
      <h2 class="h2 article-title">Hola <?php echo $_SESSION['nombre']; ?></h2>

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
        $sql = "SELECT * FROM tarea";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // Mostrar datos de cada fila
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["nomcl"] . "</td>";
                echo "<td>" . $row["apecl"] . "</td>";
                echo "<td>" . $row["nomcas"] . "</td>";
                echo "<td>" . $row["sitio"] . "</td>";
                if($row["state"] == 0){ echo "<td style='color: red'> PENDIENTE</td>";}
                else{ echo "<td style='color: green'>FINALIZADO</td>";};
                echo "<td>" . $row["dia"] . "</td>";
                echo "<td>" . $row["fere"] . "</td>";
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
  </main>

  <!-- 
    - #FOOTER
  -->

  <footer class="footer">
    <div class="container">

      <p class="copyright">
        &copy; <?php echo date("Y"); ?> <a href="#" class="copyright-link">Rino Risk</a>.Todos los derechos reservados
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

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Nueva Incidencia</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="insertar_tarea.php" method="POST">
    <label for="reporta">Nombre1:</label>
    <input type="text" class="form-control" id="reporta" name="reporta" value="<?php echo $_SESSION['nombre']; ?>">
    
    <div class="form-group">
        <label for="atiende">Asignación:</label>
        <select class="form-control" id="atiende" name="atiende">
            <option value="Sofia Gallardo">Sofia Gallardo</option>
            <option value="Rosario Banda">Rosario Banda</option>
            <option value="Abdiel Carrasco">Abdiel Carrasco</option>
            <option value="Berenice Hernades">Berenice Hernades</option>
            <option value="Daniel Bravo">Daniel Bravo</option>
            <option value="Jesus de Luna">Jesus de Luna</option>
        </select>
    </div>
    
    <div class="form-group">
        <label for="departamentos">Departamentos:</label>
        <select class="form-control" id="departamentos" name="departamentos">
            <option value="Administracion">Administración</option>
            <option value="Comercial">Comercial</option>
            <option value="Desarrollo">Desarrollo</option>
            <option value="Recursos Humanos">Recursos Humanos</option>
            <option value="Servicio agentes">Servicio agentes</option>
            <option value="Servicio asegurados">Servicio asegurados</option>
        </select>
    </div>
    
    <div class="form-group">
        <label for="observaciones">Incidencia:</label>
        <textarea class="form-control" id="observaciones" name="observaciones" rows="3"></textarea>
    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</form>
<div class="modal fade" id="modalExito" tabindex="-1" role="dialog" aria-labelledby="modalExitoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalExitoLabel">¡Éxito en la inserción!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Los datos se han insertado correctamente.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#insertForm").submit(function(e) {
            e.preventDefault();
            
            $.ajax({
                type: "POST",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function(response) {
                    $('#modalExito').modal('show');
                },
                error: function() {
                    alert('Error al insertar los datos.');
                }
            });
        });
    });
</script>


            </div>
           
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#miTabla').DataTable();
        });
    </script>
<script>