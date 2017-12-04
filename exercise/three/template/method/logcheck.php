<?php  

// session_start();
// 檢查是否有此帳號密碼
ini_set("display_errors", "On");

require 'connect.php';

$guestname = $_POST['gname'];
$guestpwd = $_POST['gpwd'];

$select = $connect -> prepare("SELECT * FROM theguest WHERE guestname = '$guestname' AND guestpassword = '$guestpwd'");
$select -> execute(array($guestname,$guestpwd));

$result = $select -> fetch(PDO::FETCH_ASSOC) ;

if ($result['guestname'] == $guestname && $result['guestpassword'] == $guestpwd) {
    session_start();
    $_SESSION['theguest'] = $result;
    header("location:./../user/index.php?query=succcess"); 
    
}elseif ($result['guestpassword'] != $guestpwd || $result['guestname'] != $guestname) {
    header("location:./../log.php?error=帳密錯誤");

}elseif ($result['guestpassword'] != '' || $result['guestname'] != '') {
    header("location:./../log.php?error=輸入不完全");
}


?>
