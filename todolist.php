<?php session_start();
	#Allen Toland-Barber
	#CSE 154 to-do list
	#Extra features 1, 2
	#contains todo list for user to interact with. 

	include 'common.php';
	redirectLogout();
	$user = $_SESSION["user"];
	top();
?>


<div id="main">
	<h2><?=$user?>'s To-Do List</h2>
	<?php  
		if(isset($_GET["fail"])){
		?> 
			<div class="fail"><p>Todo item cannont be blank.</p></div>
		<?php
		}
	?>
	<ul id="todolist">
	<?php 
		$todo = file("todo_".$user.".txt", FILE_IGNORE_NEW_LINES);
		$i = 0;
		foreach ($todo as $item) {
		?>
			<li>
				<form action="submit.php" method="post">
					<input type="hidden" name="action" value="delete" />
					<input type="hidden" name="index" value="<?=$i?>" />
					<input type="submit" value="Delete" />
				</form>
				<?=htmlspecialchars($item)?>
			</li>

		<?php
			$i++;	
		}
	 ?>
		<li>
			<form action="submit.php" method="post">
				<input type="hidden" name="action" value="add" />
				<input name="item" type="text" size="25" autofocus="autofocus" />
				<input type="submit" value="Add" />
			</form>
		</li>
	</ul>

	<div>
		<a href="logout.php"><strong>Log Out</strong></a>
		<em>(logged in since <?=$_COOKIE["timeStamp"]?>)</em>
	</div>
</div>	

<?php bottom(); ?>