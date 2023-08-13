    <?php 

if(isset($_POST['add_det_tarea']))
{

    $idtarea=$_POST['tarid'];
    $idmen=$_POST['memid'];
    $respueta=$_POST['tareresp'];

        $statement = $connect->prepare("INSERT INTO detalle_tarea (idtarea,idmen,respueta) VALUES('$idtarea', '$idmen','$respueta')");

        

         $statement2 = $connect->prepare("UPDATE tarea SET state='1' WHERE idtarea= $idtarea LIMIT 1;");

           //echo "$item";
                //Execute the statement and insert our values.
        $inserted = $statement->execute(); 
        $inserted = $statement2->execute(); 


        if($inserted>0){

    echo '<script type="text/javascript">
swal("¡Registrado!", "Se atendio correctamente", "success").then(function() {
            window.location = "../tareas/mostrar.php";
        });
        </script>';
}
else{
    

 echo '<script type="text/javascript">
swal("Error!", "No se puede atender,  comuníquese con el administrador ", "error").then(function() {
            window.location = "../tareas/mostrar.php";
        });
        </script>';

print_r($sql->errorInfo()); 
}
  

    }




?>