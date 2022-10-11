<?php include 'conexion.php';

if(isset($_POST['nombre']) && $_POST['dni'] ){
    $nombre= $_POST['nombre'];
    $dni = $_POST['dni'];
    $datos = $mysqli->query("SELECT * FROM estudiante WHERE nombre = $nombre AND dni =$dni");   
    $datos ? header("location:portada.php").session_start(): header("location:index.php");  
    
}


?>
