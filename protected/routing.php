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

			default:
				# code...
				break;
		}
	}
	else{
		
	}



?>