
<?php 
$conexion = new Conexion();
$conexion = $conexion->get_conexion(); 

$query = "SELECT * FROM usuarios";
$statement = $conexion->prepare($query);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);


 ?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Reportes de Usuarios</title>
	<link rel="stylesheet" href="estilos.css">
</head>
<body>

	<h1>Listado de Usuario</h1>
 <table  width="100%">
 	<tr style="background-color: #7abaff;padding: 30px;">
 		<td>Nombres</td>
 		<td>Apellidos</td>
 		<td>Usuarios</td>
 		<td>Correo</td>
 		<td>Dni</td>
 		<td>Fono</td>
 	</tr>
 	
 	 <?php 
      
      foreach ($result as $key => $value) {
 	  ?>
 	<tr>  
   <td><?php echo $value['nombres']; ?></td>
   <td><?php echo $value['apellidos']; ?></td>
   <td><?php echo $value['user']; ?></td>
   <td><?php echo $value['correo']; ?></td>
   <td><?php echo $value['dni']; ?></td>
   <td><?php echo $value['fono']; ?></td>
</tr>
 	  <?php 
        }

 	   ?>

 </table>	
<?php  ?>





</body>
</html>