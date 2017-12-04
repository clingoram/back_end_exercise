<!DOCTYPE html>
<!-- admin登入 -->
<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
</head>
<body>
	<div class="show">
		<h2>Admin Login</h2>
		<p><a href="../layout.php">Back</a></p>
		<form action="adminlogcheck.php" method="post">
			<input type="text" name="name" placeholder="Name" ><br>
			<input type="password" name="pwd" placeholder="pwd">
			<input type="submit" name="send" value="Log in">
		</form>
	</div>
</body>
</html>
