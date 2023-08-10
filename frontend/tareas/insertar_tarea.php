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

// Consulta SQL para insertar los datos en la tabla "tarea"
$sql = "INSERT INTO tarea (nomcl, apecl, nomcas, sitio, state, dia, celu)
        VALUES ('$reporta', '$atiende', '$observaciones', '$departamentos', '0', '', '6631231673')";

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
