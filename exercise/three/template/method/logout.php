<?php

// to log out
session_start();
unset($_SESSION["thehost"]); #刪除 session，unset($_SESSION['變數名稱']);
unset($_SESSION["theguest"]);
header("location:./../layout.php");

?>
