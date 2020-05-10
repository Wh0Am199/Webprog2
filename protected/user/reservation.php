<?php
	
	require_once DATABASE_CONTROLLER;

	if (array_key_exists('id', $_GET) && !empty($_GET['id'])) {
		
		$query = "UPDATE vehicles SET isReserved = :isReserved WHERE id = :id";
		$params = [
			':isReserved' => 1,
			':id' => $_GET['id']
		];

		$queryInsert = "INSERT INTO reserved_vehicles (uid, vehicleid) VALUES (:uid, :vehicleid)";
		$paramsInsert = [
			':uid' => $_SESSION['uid'],
			':vehicleid' => $_GET['id']
		];

		if (!executeDML($query, $params)) {
			echo "<h1>Error while updating data!</h1>";
		} elseif (!executeDML($queryInsert, $paramsInsert)) {
			echo "<h1>Error while inserting data!</h1>";
		} else {
			echo "<script> window.alert('Succesful reservation!'); window.location.href='index.php?page=ownReservations';</script>";
		}

	}


?>