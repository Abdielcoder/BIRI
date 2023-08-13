<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "incidencias"; // Cambia esto al nombre de tu base de datos

// Crear una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$reporta = $_POST["reporta"];
$atiende = $_POST["atiende"];
$departamentos = $_POST["departamentos"];
$observaciones = $_POST["observaciones"];
$fechaActual = date("Y-m-d");
$timestamp = time(); // Obtiene el timestamp actual

// Aquí puedes usar $timestamp para insertarlo en una base de datos u otra operación
echo "Timestamp actual: " . $timestamp;

// Si deseas formatear el timestamp como una fecha legible, puedes usar la función date()
$fecha_legible = date("Y-m-d H:i:s", $timestamp);
echo "Fecha legible: " . $fecha_legible;
// Consulta SQL para insertar los datos en la tabla "tarea"
$sql = "INSERT INTO tarea (nomcl, apecl, nomcas, sitio, state, dia, celu)
        VALUES ('$reporta', '$atiende', '$observaciones', '$departamentos', '0', '$fecha_legible', '6631231673')";

if ($conn->query($sql) === TRUE) {
    echo '<script>alert("Incidencia Creada!!!!")</script>'; 
    echo "<script>
            setTimeout(function() {
                window.location.href = 'mostrar.php';
            }, 3000);
          </script>";
} else {
    echo "Error al insertar los datos: " . $conn->error;
}
// Cerrar la conexión
$conn->close();
?>
