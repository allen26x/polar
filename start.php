<?php session_start();
	#Allen Toland-Barber
	#CSE 154 to-do list
	#Extra features 1, 2
	#contains login box for user

	include 'common.php';
	redirectLogin();
	top();

?>
<div id="main">
	<p>
		The best way to manage your tasks. <br />
		Never forget the cow (or anything else) again!
	</p>

	<p>
		Log in now to manage your to-do list. <br />
		If you do not have an account, one will be created for you.
	</p>
	<?php 
		$fail = 0;
		if (isset($_GET["fail"])){
			$fail = $_GET["fail"];
		}
	?>


	<form id="loginform" action="login.php" method="post">
		<?php 
		if ($fail == -1) {
		?> 
			<div class="fail"><p>Username and Password do not match.</p></div>
		<?php	
		}
		if ($fail == 3 || $fail == 1){ 
		?> 
			<div class="fail"><p>Invalid username: must be 3-8 characters long, begin with a lowercase letter, and consist entirely of lowercase
letters and numbers.</p></div>
		<?php } ?>				
		<div><input name="name" type="text" size="8" autofocus="autofocus" /> <strong>User Name</strong></div>
		<?php 
		if ($fail >= 2){
		?> 
			<div class="fail"><p>Invalid password:must be 6-12 characters long, begin with a number, and end with any character that is not a
letter or number.</p></div>
		<?php } ?>	
		<div><input name="password" type="password" size="8" /> <strong>Password</strong></div>
		<div><input type="submit" value="Log in" /></div>
	</form>

	<p>
		<em>(last login from this computer was <?=$_COOKIE["timeStamp"]?>)</em>
	</p>
</div>	
<?php bottom(); ?>