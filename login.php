<?php include 'conexion.php';


if(isset($_POST['nombre']) && $_POST['dni'] ){
    $nombre= $_POST['nombre'];
    $dni = $_POST['dni'];
    
    $datos = $mysqli->query("SELECT nombre, dni FROM estudiante WHERE nombre = '$nombre' AND dni = '$dni'");

    if(!($datos->fetch_assoc())){
        header("Location: index.php");
    }else{
        session_start();
        $_SESSION['user'] = $nombre;
        header("Location: portada.php");
    }
}

?>
