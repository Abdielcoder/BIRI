<!DOCTYPE html>
<html>
<head>
    <title>Tu página</title>
    <!-- Agrega el enlace al archivo JavaScript de SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>
<body>
<?php
// Resto de tu código PHP aquí
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "incidencias";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
date_default_timezone_set('America/Los_Angeles');

$reporta = $_POST["reporta"];
$atiende = $_POST["atiende"];
$departamentos = $_POST["departamentos"];
$observaciones = $_POST["observaciones"];
$fechaActual = date("Y-m-d");
$timestamp = time();
$fecha_legible = date("Y-m-d H:i:s", $timestamp);

$sql = "INSERT INTO tarea (nomcl, apecl, nomcas, sitio, state, dia, celu)
        VALUES ('$reporta', '$atiende', '$observaciones', '$departamentos', '0', '$fecha_legible', '6631231673')";

if ($conn->query($sql) === TRUE) {
    echo '<script type="text/javascript">
        swal("Éxito", "Registro agregado correctamente", "success").then(function() {
            window.location = "mostrar.php";
        });
    </script>';
} else {
    echo '<script type="text/javascript">
        swal("Error", "Error al insertar los datos: ' . $conn->error . '", "error");
    </script>';
}

$conn->close();
?>
</body>
</html>
