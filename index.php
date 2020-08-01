<?php
session_start();

// Sets default role to user not logged in :
if (!isset($_SESSION['role'])) {
	$_SESSION['role'] = 0;
}

$view = 'view/'; // Path to view folder
require('controller/controller.php');

// Get page :
if (isset($_GET['action'])) {
	
	switch ($_GET['action']) {
		case 'login': login();
		break;

		case 'logout': logout();
		break;

		case 'register': register();
		break;

		case 'admin': admin();
		break;

		case 'home': home();
		break;

		case '401': error_401();
		break;

		case '403': error_403();
		break;
		
		default: error_404();
		break;
	}

} else {
	// Default page :
	login();
}