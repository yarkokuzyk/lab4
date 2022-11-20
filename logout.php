<?php
	// Start sessions
	session_start();

	$_SESSION  = array();

	// Destroy all sessi on related to user
	session_destroy();

	// Redirect to login page
	header('location: login.php');
	exit;
?>