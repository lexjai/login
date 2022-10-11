
<?php

if (isset($_POST['dni']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['email']) && isset($_POST['ciclo'])) {
    
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $ciclo = $_POST['ciclo'];
    $mysqli = new mysqli("localhost", "root", "", "instituto");
    
    if ($mysqli->connect_errno) {
        echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    if (!($sentencia = $mysqli->prepare("INSERT INTO estudiante(nombre, apellido, dni, email, ciclo) VALUES (?,?,?,?,?)"))) {
        echo "Falló la preparación: (" . $mysqli->errno . ") " . $mysqli->error;
    }

    if (!$sentencia->bind_param("sssss",$nombre,$apellido,$dni,$email, $ciclo)) {
        echo "Falló la vinculación de parámetros: (" . $sentencia->errno . ") " . $sentencia->error;
    }

    if (! $sentencia->execute()) {
        echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
    }

    $sentencia->close();

    $resultado = $mysqli->query("SELECT * FROM estudiante");
    $message= "echo";
    header("Location:".$_SERVER[HTTP_REFERER]."");
   
} else {
    echo ("<br>Error en parametros<br>");
}
    

