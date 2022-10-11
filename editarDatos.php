<?php
include 'conexion.php';
if (isset($_POST['dni']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['email']) && isset($_POST['ciclo'])) {
    
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $ciclo = $_POST['ciclo'];
    
 
	         if (!($sentencia = $mysqli->prepare("UPDATE `estudiante` SET `nombre`=?,`apellido`=?,`email`=?,`ciclo`=? WHERE dni='$dni'"))) {
	             echo "Falló la preparación: (" . $mysqli->errno . ") " . $mysqli->error;
	         }
	         
	         /* Sentencia preparada, etapa 2: vinculación y ejecución */
	         if (!$sentencia->bind_param("ssss", $nombre, $apellido, $email, $ciclo)) {
	             echo "Falló la vinculación de parámetros: (" . $sentencia->errno . ") " . $sentencia->error;
	         }
	         
	         if (!$sentencia->execute()) {
	             echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
	         }
	         header("Location:".'portada.php'."");
}  else{
    echo("<br>Error en parametros<br>");
    
}

	     
	     ?>
	   