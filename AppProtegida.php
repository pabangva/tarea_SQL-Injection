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
		try {
			$conn = new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$item = $_GET['search'];
	
			$stmt = $conn->prepare("SELECT * FROM productos WHERE nombre LIKE :item");
			$stmt->bindParam(':item', $item);
			$stmt->execute();
			$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
			echo '<table class="table table-striped table-bordered table-hover">'; 
			echo "<tr><th>Nombre</th><th>Detalle</th><th>Precio</th><th>CantDisponibles</th></tr>"; 
			
			foreach($results as $row) {
				echo "<tr>";
				echo "<td>".$row['Nombre']."</td>";
				echo "<td>".$row['Detalle']."</td>";
				echo "<td>".$row['Precio']."</td>";
				echo "<td>".$row['CantDisponibles']."</td>";
				echo "</tr>";
			}
			echo "</table>";
			
		} catch(PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
    	$conn = null;
    }
	?>

</body>

</html>_ _ 
