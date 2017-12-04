<?php  

session_start();
ini_set("display_errors","On");
date_default_timezone_set("Asia/Taipei");

require '../method/connect.php';

header("location:./index.php"); 

$user = $_SESSION["theguest"]["guestname"];

$guestmessage = $_POST['guestmessage'];
$guestsave = $_POST['guestsave'];
$time = date("Y-m-d H:i:s");

if(isset($guestmessage)&&($guestsave)) {

	if ($_SESSION["theguest"]["guestname"] != Null) {

		$sql= "INSERT INTO posts(idposts,body,post_time,who_say) VALUES(NULL,'$guestmessage','$time','$user')";

		try {
			$stmt = $connect -> prepare($sql);
			$stmt -> execute(array($guestmessage,$time));
			//$arr = $stmt ->errorInfo();
			//print_r($arr);

		} catch (Exception $e) {
			echo "Failed to inserted data to MySQL. Cause:<br>".$e->getMessage();
			exit();
		}
	}
	
} 

?>
