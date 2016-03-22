<?php
/**
 * Created by PhpStorm.
 * User: ashir
 * Date: 3/22/16
 * Time: 5:42 PM
 */


require '../config/conn.php';

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$username = test_input($_POST['username']);
$password = test_input($_POST['password']);
$SQL = $conn->prepare('Select * From User Where username = ? AND password = ?');
$SQL->bindValue('1',$username);
$SQL->bindValue('2',$password);
$SQL->execute();
$info = $SQL->fetch();

if ($SQL->rowCount() > 0) {
    session_start();
    $_SESSION['login'] = 1;
    $_SESSION['userid'] = $info['UserId'];
    header('location: ../');
    exit;
}
else {
    header('location: ../signin.php?status=error');
    exit;
}
?>

<?php

?>

<?php

?>

