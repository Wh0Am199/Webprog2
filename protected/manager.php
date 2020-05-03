<?php 
function IsUserLoggedIn() {
	return $_SESSION  != null && array_key_exists('uid', $_SESSION) && is_numeric($_SESSION['uid']);
}

function UserLogout() {
	session_unset();
	session_destroy();
	header('Location: index.php');
}

function UserLogin($email, $password) {
	$query = "SELECT uid, firstName, lastName, email, isAdmin FROM users WHERE email = :email AND password = :password";
	$params = [
		':email' => $email,
		':password' => sha1($password)
	]; 

	require_once DATABASE_CONTROLLER;
	$record = getRecord($query, $params);
	if(!empty($record)) {
		$_SESSION['uid'] = $record['uid'];
		$_SESSION['firstName'] = $record['firstName'];
		$_SESSION['lastName'] = $record['lastName'];
		$_SESSION['email'] = $record['email'];
		$_SESSION['isAdmin'] = $record['isAdmin'];
		header('Location: index.php');
	}
	return false;
}

function UserRegister($username, $firstName, $lastName, $email, $password, $address, $additionalAddress="", $birthDate, $city, $state, $zip, $isAdmin=0) {
	$query = "SELECT uid FROM users WHERE email = :email";
	$params = [ ':email' => $email ];

	require_once DATABASE_CONTROLLER;
	$record = getRecord($query, $params);
	if(empty($record)) {
		$query = "INSERT INTO users (username, firstName, lastName, email, password, address, additionalAddress, birthDate, city, state, zip, isAdmin) VALUES (:username, :first_name, :last_name, :email, :password, :address, :additionalAddress, :birthDate, :city, :state, :zip, :isAdmin)";
		$params = [
			':username' => $username,
			':first_name' => $firstName,
			':last_name' => $lastName,
			':email' => $email,
			':password' => sha1($password),
			':address' => $address,
			':additionalAddress' => $additionalAddress,
			':birthDate' => $birthDate,
			':city' => $city,
			':state' => $state,
			':zip' => $zip,
			':isAdmin' => $isAdmin
		];

		if(executeDML($query, $params)) 
			header('Location: index.php?P=login');
	} 
	return false;
}

?>