<?php 
require_once('../../backend/config/Conexion.php'); 
 if(isset($_POST['add_member']))
 {
  //$username = $_POST['user_name'];// user name
  //$userjob = $_POST['user_job'];// user email
    $nomenb=trim($_POST['mennom']);
    $apmenb=trim($_POST['menape']);
    $sexo=trim($_POST['mensex']);
    $celu=trim($_POST['mencel']);
    $username=trim($_POST['menusu']);
    $correo=trim($_POST['mencor']);
    $contra=MD5($_POST['mencon']);


    
   
    
  if(empty($nomenb)){
   $errMSG = "Please enter number.";
  }

   
  $stmt = "SELECT * FROM miembros WHERE nomenb ='$nomenb'";
   if(empty($nomenb)) {
             echo '<script type="text/javascript">
swal("Error!", "Ya existe el registro a agregar!", "error").then(function() {
            window.location = "../miembros/nuevo.php";
        });
        </script>';


         }

         else
         {  // Validaremos primero que el document no exista
            $sql="SELECT * FROM miembros WHERE nomenb ='$nomenb'";
            

            $stmt = $connect->prepare($sql);
            $stmt->execute();

            if ($stmt->fetchColumn() == 0) // Si $row_cnt es mayor de 0 es porque existe el registro
            {
                if(!isset($errMSG))
  {
$stmt = $connect->prepare("INSERT INTO miembros(nomenb,apmenb,sexo,celu,username,correo,contra,rol,state) VALUES(:nomenb,:apmenb,:sexo,:celu,:username,:correo,:contra,'2','1')");
$stmt->bindParam(':nomenb',$nomenb);
$stmt->bindParam(':apmenb',$apmenb);
$stmt->bindParam(':sexo',$sexo);
$stmt->bindParam(':celu',$celu);
$stmt->bindParam(':username',$username);
$stmt->bindParam(':correo',$correo);
$stmt->bindParam(':contra',$contra);



   if($stmt->execute())
   {
    echo '<script type="text/javascript">
swal("¡Registrado!", "Se agrego correctamente", "success").then(function() {
            window.location = "../miembros/mostrar.php";
        });
        </script>';
   }
   else
   {
    $errMSG = "error while inserting....";
   }

  } 
            }

                else{

                     echo '<script type="text/javascript">
swal("Error!", "No se pueden agregar datos,  comuníquese con el administrador ", "error").then(function() {
            window.location = "../miembros/nuevo.php";
        });
        </script>';

 // if no error occured, continue ....

}
  

  }
 
 }
?>