<?php session_start();
	#Allen Toland-Barber
	#CSE 154 to-do list
	#Extra features 1, 2
	
	include 'common.php';
	redirectLogout();
	$user = $_SESSION["user"];
	$action = $_POST["action"];

	if ($action == "delete") { #deleting item
		$todo = file("todo_".$user.".txt");
		$index = $_POST["index"];
		$todo = array_merge(array_slice($todo, 0, $index), array_slice($todo, $index + 1));
		file_put_contents("todo_".$user.".txt", "");
		foreach ($todo as $item) {
			file_put_contents("todo_".$user.".txt", $item, FILE_APPEND); 
		} 
	}
	if ($action == "add") { #adding item to list
		$item = "";
		if (isset($_POST["item"])) {
			$item = $_POST["item"];
		}
		if ($item == "") {
			header("Location: todolist.php?fail=true");
			die();
		}
		file_put_contents("todo_".$user.".txt", $_POST["item"]."\n", FILE_APPEND); 
	}
	redirectLogin();

?>