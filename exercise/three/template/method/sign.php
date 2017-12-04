<?php

// to sign up as a new member
ini_set("display_errors","On");
require 'connect.php';

$newmember = $_POST['name'];
$newpwd = $_POST['pwd'];
$secret = md5($newpwd);

$sql ="INSERT INTO theguest(idguest,guestname,guestpassword) VALUES(NULL,'$newmember','$newpwd')";

$insert = $connect -> prepare($sql);
$insert -> execute(array($newmember,$newpwd));

header("location:./../log.php?=signupsuccess");

?>
