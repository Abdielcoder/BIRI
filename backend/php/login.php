<?php 
    require '../backend/config/Conexion.php';

    if(isset($_POST['login'])) {
    $errMsg = '';

    // Get data from FORM
    $username = $_POST['username'];
    
    $contra = MD5($_POST['contra']);

    if($username == '')
      $errMsg = 'Digite su usuario';
    if($contra == '')
      $errMsg = 'Digite su contraseña';

    if($errMsg == '') {
      try {
$stmt = $connect->prepare('SELECT id, username,nombre,correo,contra, rol, state FROM usuarios WHERE username = :username UNION SELECT idmen, username,nomenb,correo,contra, rol, state FROM miembros WHERE username = :username');


        $stmt->execute(array(
          ':username' => $username
          
          
          ));
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if($data == false){
          $errMsg = "El usuario: $username no se encuentra , puede solicitarlo con el administrador.";
        }
        else {
          if($contra == $data['contra']) {

            $_SESSION['id'] = $data['id'];
            $_SESSION['nombre'] = $data['nombre'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['contra'] = $data['contra'];
            $_SESSION['correo'] = $data['correo'];
            $_SESSION['rol'] = $data['rol'];
            $_SESSION['state'] = $data['state'];
            
            
          if($_SESSION['rol'] == 1){
                header('Location: administrador/escritorio.php');
              }else if($_SESSION['rol'] == 2){
                header('Location: administrador_miembro/escritorio.php');
              }
                  exit;
                }
                else
                  $errMsg = 'Contraseña incorrecta.';
        }
      }
      catch(PDOException $e) {
        $errMsg = $e->getMessage();
      }
    }
  }
 ?>