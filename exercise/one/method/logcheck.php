<?php  

ini_set("display_errors", "On");

require 'connect.php';

$account = $_POST['name'];
$password = $_POST['pwd'];

$select = $connect -> prepare("SELECT * FROM thehost WHERE name ='$account' AND password = '$password'");
$select -> execute(array($account,$password));
$result = $select -> fetch(PDO::FETCH_ASSOC) ;

if ($result['name'] == $account && $result['password']==$password) {
    session_start();
    $_SESSION['thehost'] = $result;
    header("location:./../log.php?query=登入成功");
    
}elseif ($result['password'] != $password || $result['name'] != $account) {
    header("location:./../log.php?error=帳密錯誤");

}elseif ($result['password'] != ''||$result['name'] != '') {
    header("location:./../log.php?error=輸入不完全");
}

?>
