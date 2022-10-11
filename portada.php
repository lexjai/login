<?php include 'conexion.php';
      

session_start();
if(!isset($_SESSION['user'])){
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<script>
	function mostrar(){
		var div= document.getElementById("fportada");
		div.style.display=="block" ?
		div.style.display="none" : div.style.display="block" ;
		console.log(div.style.display);

	}
</script>
</head>
<body>
        <div class="buton">
		<div class="salir">
        <a href ="salir.php"> Salir</a>
		<button Onclick="mostrar()">+</button>

        </div>

		</div>
        
	
	<div class="content">
	<table>
		
		<thead>
			<tr>

				<th>DNI</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>E-mail</th>
				<th>Ciclo</th>
				<th>Acciones</th>
			</tr>

		</thead>
		<tbody>
        
        <?php
        $dato = $mysqli->query("SELECT * FROM estudiante");

        while ($row = $dato->fetch_assoc()) {
            echo '<tr>
            <td>' . $row['dni'] . '</td>' . '<td>' . $row['nombre'] . '</td>' . '<td>' . $row['apellido'] . '</td>' . '<td>' . $row['email'] . '</td>' . '<td>' . $row['ciclo'] . '</td>' . ' <td>
            <a href="ver.php?id='.$row['id'].'" >Ver</a>
            <a href="borrar.php?id='.$row['id'].'"  > Eliminar</a>
            <a href="editar.php?id='.$row['id'].'" >Modificar</button></a>' . '</tr>';
        }

        ?>
           
        </tbody>
	</table>
	
	<div class="formulario" id="fportada">
	   
	   
	   <form action="insertar.php" method="POST">
       
			<div class="datos">
				<label for="dni">DNI:</label> <input type="text" name="dni" required >
			</div>
			<div class="datos">
				<label for="nombre">NOMBRE:</label> <input type="text" name="nombre"
					required>
			</div>
			<div class="datos">
				<label for="apellido">APELLIDOS:</label> <input type="text"
					name="apellido" required>
			</div>
			<div class="datos">
				<label for="email">E-MAIL:</label> <input type="text" name="email"
					required>
			</div>
			<div class="datos">
				<label for="ciclo">CICLO:</label> <input type="text" name="ciclo"
					required>
			</div>

			<input type="submit" id ="#btn" value="Enviar">
		</form>
	</div>
	</div>

</body>
</html>