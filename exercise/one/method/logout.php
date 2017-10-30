<?php

session_start();
unset($_SESSION["thehost"]); #刪除 session，unset($_SESSION['變數名稱']);
header("location:./../log.php");

?>
