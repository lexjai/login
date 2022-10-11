
<?php include 'conexion.php';
session_start();
if(!isset($_SESSION['user'])){
    header("Location: index.php");
}?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
</head>
<body>
	<div class="formulario">
	     <?php 
	     if(isset($_GET['id'])){
	         $id = $_GET['id'];
	         $datoLlenos = $mysqli->query("SELECT *FROM estudiante WHERE id= $id");
	        
	         while ($row = $datoLlenos->fetch_assoc()) {
	         
	             ?><!--  -->
	             
	              <form action="editarDatos.php" method="POST">
       
			<div class="datos">
				<label for="dni">DNI:</label> <input style="background-color:grey" type="text" name="dni"  readonly  value="<?php echo $row['dni']?>">
			</div>
			<div class="datos">
				<label for="nombre">NOMBRE:</label> <input type="text" name="nombre"
					  value="<?php echo $row['nombre']?>">
			</div>
			<div class="datos">
				<label for="apellido">APELLIDOS:</label> <input type="text"
					name="apellido"   value="<?php echo $row['apellido']?>">
			</div>
			<div class="datos">
				<label for="email">E-MAIL:</label> <input type="text" name="email"
					  value="<?php echo $row['email']?>">
			</div>
			<div class="datos">
				<label for="ciclo">CICLO:</label> <input type="text" name="ciclo"
					  value="<?php echo $row['ciclo']?>">
			</div>

			<input type="submit" value="volver">
		</form>
	             
	             
	         <?php 
	         }
	     }  
	     
	     ?>
	   
	     
	  
	</div>
	
</body>
</html>