<?php  
if(isset($_POST['upd_conf']))
{
    $id=$_POST['sistid'];
    $contra=MD5($_POST['contconf']);
    
    try {

        $query = "UPDATE usuarios SET contra=:contra WHERE id=:id LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
            ':contra' => $contra,
            
            ':id' => $id
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            echo '<script type="text/javascript">
swal("Actualizado!", "Contraseña actualizada correctamente", "success").then(function() {
            window.location = "../configuracion/mostrar.php";
        });
        </script>';
            exit(0);
        }
        else
        {
           echo '<script type="text/javascript">
swal("Error!", "Error", "success").then(function() {
            window.location = "../configuracion/mostrar.php";
        });
        </script>';
            exit(0);
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>



