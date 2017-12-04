<?php  

session_start();
ini_set("display_errors","On");
date_default_timezone_set("Asia/Taipei");

header("location:./../user/index.php"); 
require 'connect.php';

// insert
$who = $_SESSION["thehost"]["name"];
$message = $_POST['message'];
$save = $_POST['save'];
$time = date("Y-m-d H:i:s");

if(isset($message)&&($save)) {

	if ($_SESSION["thehost"]["name"] == "Wildboar") {
		$sql = "INSERT INTO posts(idposts,body,post_time,who_say) VALUES(NULL,'$message','$time','$who')";

		try {
			$stmt = $connect ->  prepare($sql);
			$stmt -> execute(array($message,$time,$who));

		} catch (Exception $e) {
			echo "Failed to inserted data to MySQL. Cause:<br>".$e->getMessage();
			exit();
		}
	}
}

?>
