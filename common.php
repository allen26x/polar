<?php session_start();
	#Allen Toland-Barber
	#CSE 154 to-do list
	#Extra features 1, 2
	
	#redirects to todolist.php if the user is logged in 
	function redirectLogin(){
		if (isset($_SESSION["user"])) {
			header("Location: todolist.php");
			die();
		}	
	}
	
	#redirects to start.php if the user is not logged in 
	function redirectLogout(){
		if (!isset($_SESSION["user"])) {
			header("Location: start.php");
			die();
		}	
	}

	#provides start of html
	function top(){
		?><!DOCTYPE html>
			<html>
				<head>
					<meta charset="utf-8" />
					<title>Remember the Cow</title>
					<link href="https://webster.cs.washington.edu/css/cow-provided.css" type="text/css" rel="stylesheet" />
					<link href="cow.css" type="text/css" rel="stylesheet" />
					<link href="https://webster.cs.washington.edu/images/todolist/favicon.ico" type="image/ico" rel="shortcut icon" />
				</head>

				<body>
					<div class="headfoot">
						<h1>
							<img src="https://webster.cs.washington.edu/images/todolist/logo.gif" alt="logo" />
							Remember<br />the Cow
						</h1>
					</div>
		<?php	
	}

	#provides end of html
	function bottom(){
		?> 

				<div class="headfoot">
					<p>
						<q>Remember The Cow is nice, but it's a total copy of another site.</q> - PCWorld<br />
						All pages and content &copy; Copyright CowPie Inc.
					</p>

					<div id="w3c">
						<a href="https://webster.cs.washington.edu/validate-html.php">
							<img src="https://webster.cs.washington.edu/images/w3c-html.png" alt="Valid HTML" /></a>
						<a href="https://webster.cs.washington.edu/validate-css.php">
							<img src="https://webster.cs.washington.edu/images/w3c-css.png" alt="Valid CSS" /></a>
					</div>
				</div>
			</body>
		</html>

<?php
	}

 ?>