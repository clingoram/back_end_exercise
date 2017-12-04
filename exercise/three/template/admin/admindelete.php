<?php
// delete
session_start();
ini_set("display_errors","On");

header("location:./manage.php");

require '../method/connect.php';

if(isset($_GET['id'])){
	$id = $_GET['id'];
	try{
		$sql= "DELETE FROM posts WHERE idposts='$id'";
		$delete = $connect -> prepare($sql);
		$delete -> execute(array($id));

	} catch(Exception $e) {
		echo "Failed to delete data to MySQL. Cause:<br>".$e->getMessage();
		exit();
	}
}

?>
