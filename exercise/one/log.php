<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body>
	<div id="show">
		<form id="confirm" action="method/logcheck.php" method="post">
			<?php

			session_start();
			require_once 'method/connect.php';
			ini_set("display_errors", "Off");

			if($_SESSION["thehost"]["name"]!=Null){
				echo "Welocome"." ".$_SESSION["thehost"]["name"];?>
			<?php }else{
				echo "Welocome to Login";
			}

			?>
			<input type="text" name="name" placeholder="Name"><br>
			<input type="text" name="pwd" placeholder="pwd">
			<input type="submit" name="send">
			<?php 
			if($_SESSION["thehost"]["name"]!=Null){ ?>
			  <button><a href="method/logout.php">Log Out</a></button>
			<?php }
			?>
		</form>
	</div>
</body>
</html>
