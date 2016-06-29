<?php session_start();
	#Allen Toland-Barber
	#CSE 154 to-do list
	#Extra features 1, 2
	#logs in the user if provided a valid username and password and redirects to todolist.php

	include 'common.php';
	redirectLogin();

	function login($user){
		$_SESSION["user"] = $user;
		setcookie("timeStamp", date("M d, g:i a"), time() + 60 * 60 * 24 * 7);
		redirectLogin();
	}

	$user = $_POST["name"];
	$pass = $_POST["password"];


	$fail = 0;
	if (!preg_match("/^[a-z][a-z0-9]{2,7}$/", $user)){
		$fail++;
	}  
	if (!preg_match("/^.{5,11}[^a-z0-9]$/", $pass) || preg_match("/^.*".$user.".*$/", $pass)){
		$fail +=2;
	}
	if ($fail > 0) {
		header("Location: start.php?fail=".$fail);
		die();
	}


	$logins = file("user.txt");
	foreach ($logins as $login) {
		if (trim(preg_replace("/:.*/", "", $login)) == $user) { 
			if(trim(preg_replace("/^[a-z0-9]*:/", "", $login)) == $pass) { #username password match, just login
				login($user);
			} else { #username password missmatch, try again
				header("Location: start.php?fail=-1");
				die();						
			}
		}		 
	}
	file_put_contents("user.txt", $user.":".$pass."\n", FILE_APPEND); #user not found, create new
	file_put_contents("todo_".$user.".txt", ""); 
	
	login($user);
 ?>