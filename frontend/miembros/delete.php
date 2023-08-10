<?php 
if (!isset($_GET['id'])) {
    exit();
  }

  $id = $_GET['id'];
  include '../../backend/config/Conexion.php';

  // sql to delete a record
    $sql = "DELETE FROM miembros WHERE id=3";

    $sentencia = $connect->prepare("DELETE FROM miembros WHERE idmen = ?;");

    $resultado = $sentencia->execute([$id]);

      if ($resultado === TRUE) {
    

        header('Location: mostrar.php');

  }else{
    

     echo '<script type="text/javascript">
swal("Error!", "No se pueden eliminar datos,  comuníquese con el administrador ", "error").then(function() {
            window.location = "mostrar.php";
        });
        </script>';
  }

 ?>