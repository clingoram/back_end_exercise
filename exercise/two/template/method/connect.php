<?php  

$dbconnect = 'mysql:host=localhost;port=3306;dbname=course';

try {
    $connect = new PDO($dbconnect,'nb-lai','123456'); # db,username,pwdof mysql
    $connect -> query("SET NAMES 'utf8' ");
    $connect -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

} catch (Exception $e) {
    echo "Failed to connect with database.Cause: <br> ".$e->getMessage();
    exit();
}

?>
