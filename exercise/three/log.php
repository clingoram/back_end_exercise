<!DOCTYPE html>
<?php 
session_start();
require_once 'method/connect.php';
ini_set("display_errors", "Off");
?>
<html>
<head>
	<title>LogIn/SignUp - Course 5</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<div class="show">
		<p><a href="layout.php">Back</a></p>
		<!-- 顯示註冊&登入按鈕 -->
		<ul class="group_tab">
			<li class="tab active"><a href="#login">Log In</a></li>
			<li class="tab"><a href="#signup">Sign Up</a></li>
		</ul>

		<div class="content_tab">
			<!-- guest log in -->
			<div id="login">
				<h2>Welcome Back</h2>
				<form class="confirm" action="method/logcheck.php" method="post">
					<?php

						if($_SESSION["theguest"]["guestname"]!=Null){
							echo "Welocome Back"." ".$_SESSION["theguest"]["guestname"];?>
						<?php }
					?>
					<input type="text" name="gname" placeholder="Name" ><br>
					<input type="password" name="gpwd" placeholder="pwd">
					<input type="submit" name="send" value="Log in">
				</form>
				<a id="forget" href="#">Forget the Password?</a>
			</div>

			<!-- sign up -->
			<div id="signup">
				<h2>Sign Up</h2>
				<form class="confirm" action="method/sign.php" method="post">
					<input type="text" name="name" placeholder="Name" required><br>
					<input type="password" name="pwd" placeholder="Set password" required>
					<input type="submit" name="send" value="Sign Up">
				</form>
			</div>
		</div>
		
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/script.js"></script>
</body>
</html>
