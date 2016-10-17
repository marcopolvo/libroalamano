<?php 
/*    if(!isset($_SESSION['usuario'])){
        //header('location: index.php');
        echo 'la sesion no ha sido iniciada';
    }else{
        $usuario = $_SESSION['usuario'];
    }
*/

  session_start();
  unset($_SESSION["nombre_usuario"]); 
  unset($_SESSION["nombre_cliente"]);
  session_destroy();
  header("Location: ../index.php");
  exit;

?>
