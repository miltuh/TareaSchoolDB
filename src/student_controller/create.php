<?php
require_once('../database/connection.php');

$fullname  = $_POST['name'];
$birthdate = $_POST['birthdate'];
$sql = "insert into student values(null, null, '$fullname', '$birthdate', 1)";

echo $fullname;
echo $birthdate;
echo $is_active;

if(isset($db_con) == false){

?php
include_once('../database/connection.php');

$id = $_GET['id'];
$sql = "UPDATE student SET is_active = 0 WHERE id = $id";

$db_con -> exec($sql);
header('Location: ../../student/list.php');

?>
}else{
    $db_con -> exec($sql);
    header('Location: ../../student/list.php');
}

?>
