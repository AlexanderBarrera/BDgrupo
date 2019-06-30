<?php include('../templates/header.php');?>
<?php
	require("../config/conexion.php");
	$habitacion_id = $_GET['var'];
	$query = "SELECT H.id_habitacion, R.fecha_inicio, R.fecha_fin
				FROM reservas R, reservas_habit H
				WHERE R.id_reserva = H.id_reserva and H.id_habitacion = $habitacion_id;";
	$maximo = "SELECT max(id_reserva) FROM reservas;";
	$maximo = $db33 -> prepare($maximo);
	$maximo -> execute();
	$maximo= $maximo -> fetchAll();
	foreach ($maximo as $r) {
		$maximo = $r[0];
	}
	$maximo = (int)$maximo + 1;
	$result = $db33 -> prepare($query);
	$result -> execute();
	$dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
	if (isset($_POST['fecha_entrada'])) {
		$bool = false;
		$entrada = $_POST['fecha_entrada'];
		$salida = $_POST['fecha_salida'];
		foreach ($dataCollected as $r) {
			echo('</br>');
			if (($salida > $r[1] && $salida < $r[2]) || ($entrada > $r[1] && $entrada < $r[2]) || ($entrada < $r[1] and $salida > $r[2])) {
				$bool = true;
			}
		}
		if ($bool == false) {
			echo($maximo);
			$query_insertar = "INSERT INTO reservas VALUES ('$maximo', '$entrada', '$salida');";
			$db33 -> exec($query_insertar);
			$query_insertar = "INSERT INTO reservas_habit VALUES ('$maximo', '$habitacion_id');";
			$db33 -> exec($query_insertar);
			$id_usuario = $_SESSION['login_id'];
			$query_insertar = "INSERT INTO reservas_usuarios VALUES ('$maximo', '$id_usuario');";
			$db33 -> exec($query_insertar);
			header("location: /~grupo33/entrega3/users/userpage.php");
		}

		else {
			echo "No hay disponibilidad en la fecha solicitada </br>";
		}
		
	}
?>

<form action='' method='post'>
	<input type='date' name='fecha_entrada'>
	<input type='date' name='fecha_salida'>
	<input type='Submit' value='Ver disponibilidad'>
</form>