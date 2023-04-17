<!DOCTYPE html>
<html>
<head>
	<title>MarketPlace</title>
	<meta charset="utf-8">
</head>
<body>
	<h1>Inventario Productos</h1>
	<form action="" method="GET">
		<input type="text" name="search">
		<input type="submit" name="submit" value="Search">
	</form>

<?php
	if (isset($_GET['search'])) {
		$host = "localhost";
		$db = "tarea";
		$user = "root";
		$pwd = "Tarea12345";
		$link = new mysql($host, $user, $pwd, $db);
		if ($link->connect_error) {
			die("Connection failed: " . $link->connect_error);
		}
		$item = $_GET['search'];
		$query = "SELECT * FROM productos WHERE nombre LIKE '%$item%'";
		$results = mysql_query($link, $query);
		// if ($results->num_rows === 0) {
		// 	echo "<p>No results found</p>"
		// }
		while($row = mysql_fetch_array($results))
		{
			echo '<table class="table table-striped table-bordered table-hover">'; 
			echo "<tr><th>Nombre</th><th>Detalle</th><th>Precio</th><th>CantDisponibles</th></tr>"; 
			// while($row = mysql_fetch_array($results))
			// {
			//   echo "<tr><td>"; 
			//   echo $row['Nombre'];
			//   echo "</td><td>";   
			//   echo $row['Detalle'];
			//   echo "</td><td>";
			//   echo $row['Precio'];
			//   echo "</td><td>";    
			//   echo $row['CantDisponibles'];
			//   echo "</td></tr>";  
			// }
			echo "</table>"; 
		}
	}	
?>
</body>

</html>
