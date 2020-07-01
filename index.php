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
		case 'home': home();
		break;
		
		default: error_404();
		break;
	}

} else {
	// Default page :
	home();
}