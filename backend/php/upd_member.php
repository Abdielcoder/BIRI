<?php  
if(isset($_POST['upd_member']))
{
    $idmen=trim($_POST['menid']);
    $nomenb=trim($_POST['mennom']);
    $apmenb=trim($_POST['menape']);
    $sexo=trim($_POST['mensex']);
    $celu=trim($_POST['mencel']);
    $username=trim($_POST['menusu']);
    $correo=trim($_POST['mencor']);
   
    try {

        $query = "UPDATE miembros SET nomenb=:nomenb,apmenb=:apmenb,sexo=:sexo,celu=:celu,username=:username,correo=:correo WHERE idmen=:idmen LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
          
            ':nomenb' => $nomenb,
            ':apmenb' => $apmenb,
            ':sexo' => $sexo,
            ':celu' => $celu,
            ':username' => $username,
            ':correo' => $correo,
            ':idmen' => $idmen
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            echo '<script type="text/javascript">
swal("Actualizado!", "Se actualizó correctamente", "success").then(function() {
            window.location = "../miembros/mostrar.php";
        });
        </script>';
            exit(0);
        }
        else
        {
           echo '<script type="text/javascript">
swal("Error!", "No se pueden agregar datos,  comuníquese con el administrador ", "error").then(function() {
            window.location = "../miembros/mostrar.php";
        });
        </script>';
            exit(0);
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>



