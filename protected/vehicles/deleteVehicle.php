<?php
	
	require_once DATABASE_CONTROLLER;

	if (array_key_exists('id', $_GET) && !empty($_GET['id'])) {

		$query1 = "DELETE FROM vehicles WHERE id = :id";
		$params1 = [
			':id' => $_GET['id']
		];

		$query2 = "DELETE FROM reserved_vehicles WHERE vehicleid = :id";
		$params2 = [
			':id' => $_GET['id']
		];


		if (!executeDML($query1, $params1) && !executeDML($query2, $params2)) {
			echo "<h1>Error while deleting data!</h1>";
		} else {
			header ('Location: index.php?page=vehicles');
		}

	}


?>