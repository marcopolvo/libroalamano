<?php
    SESSION_START(); 
    
    if (!isset($_SESSION['usuario'])) {
        //header('location: index.php');
    }
     echo 'te conectaste correctamente'
?>
