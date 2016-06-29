<?php session_start();
	#Allen Toland-Barber
	#CSE 154 to-do list
	#Extra features 1, 2
	include 'common.php';
	redirectLogout();
	session_destroy();
	session_regenerate_id(TRUE);
	session_start(); 
	redirectLogout();
?>