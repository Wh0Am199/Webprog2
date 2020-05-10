<?php

	if (array_key_exists('page', $_GET) && !empty($_GET['page'])) {
		
		switch ($_GET['page']) {

			case 'home':
				require_once PROTECTED_DIR.'home.php';
				break;
			
			case 'register':
				require_once PROTECTED_DIR.'user/register.php';
				break;
			
			case 'login':
				require_once PROTECTED_DIR.'user/login.php';
				break;

			case 'logout': 
				IsUserLoggedIn() ? UserLogout() : header('Location: index.php'); 
				break;

			case 'reservation':
				require_once PROTECTED_DIR.'user/reservation.php';
				break;

			case 'ownReservations':
				require_once PROTECTED_DIR.'user/ownReservations.php';
				break;
				
			case 'vehicles':
				require_once PROTECTED_DIR.'vehicles/availableVehicles.php';
				break;

			case 'vehicleProfile':
				require_once PROTECTED_DIR.'vehicles/vehicleProfile.php';
				break;

			case 'addVehicle':
				require_once PROTECTED_DIR.'vehicles/addVehicle.php';
				break;

			default:
				require_once PROTECTED_DIR.'home.php';
				break;

		}
	}
	else{
		
	}



?>