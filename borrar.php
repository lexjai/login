<?php
include 'conexion.php';

if(isset($_GET['id'])){
    $id= $_GET['id'];
    if($sentencia = $mysqli->prepare("DELETE FROM estudiante WHERE id= ?")){
        echo "Falló la preparación: (" . $mysqli->errno . ") " . $mysqli->error;
    }
    if (!$sentencia->bind_param("i", $id)) {
        echo "Falló la vinculación de parámetros: (" . $sentencia->errno . ") " . $sentencia->error;
    }
    if (!$sentencia->execute()) {
        echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
    }
    
    $sentencia->close();
    header("Location:".$_SERVER[HTTP_REFERER]."");
    
    
}