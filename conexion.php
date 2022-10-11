
<link rel="stylesheet" href="styles.css">
<?php
$mysqli = new mysqli("localhost", "root", "", "instituto");
    
    if ($mysqli->connect_errno) {
        echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }


