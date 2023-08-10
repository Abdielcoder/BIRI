 <?php 
session_start();
    if (isset($_SESSION['id'])){
        header('Location: administrador/escritorio.php');
    }
include_once '../backend/php/login.php'

?>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Bitacora Rino</title>
        <link rel="icon" type="image/png" href="../backend/img/ae.png">
        <link rel="stylesheet" href="../backend/css/style.css">
    </head>
    <body>
        <section> 
       
            <div class="imgBx">
                <img src="../backend/img/RINO.JPG" style="width:75%;margin-left:12%">
            </div>
       
            <div class="contentBx">
                <div class="formBx">
                    <h2>Bitacora Rino</h2>
                    <?php 
                            if (isset($errMsg)) {
                                echo '
                <div style="color:#FF0000;text-align:center;font-size:20px; font-weight:bold;">'.$errMsg.'</div>';  ;
                            }

                        ?>
                    <form method="POST" role="form" onsubmit="return validacion()">
                        <div class="inputBx">
                            <span>Nombre de usuario</span>
                            <input name="username" required value="<?php if(isset($_POST['username'])) echo $_POST['username'] ?>"  autocomplete="off"  autocomplete="off" type="text" placeholder="@rinorisk"> 
                        </div>
                        <div class="inputBx">
                            <span>Contraseña</span>
                            <input type="password" required id="contra"  name="contra" value="<?php if(isset($_POST['contra'])) echo MD5($_POST['contra']) ?>" value="ejm:*******"> 
                        </div>
                        <div class="remember">
                            <label><input type="checkbox"> Recuardame</label>
                        </div>
                        <div class="inputBx">
                          
                            <button name='login' class="signup-btn" type="submit">Entrar</button>
                        </div>
                      
                    </form>
                   
                </div>
            </div>
        </section>
        <script type="text/javascript" src="../backend/js/validate.js"></script>
        <script type="text/javascript" src="../backend/js/reenvio.js"></script>
    </body>
</html>