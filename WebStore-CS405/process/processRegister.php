<?php
/**
 * Created by PhpStorm.
 * User: ashir
 * Date: 3/22/16
 * Time: 5:42 PM
 */

print_r($_POST);

require '../config/conn.php';
//echo $conn;

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['confirmpassword'] != $_POST['password'] ) {
        header('location: ../signup.php?error=1');
        exit;
    }
    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);
    $SQL = $conn->prepare('INSERT INTO User (username,password) values (?,?)');
    $SQL->bindValue('1',$username);
    $SQL->bindValue('2',$password);
    $SQL->execute();

    $SQL = $conn->prepare('Select * From User Where username = ? AND password = ?');
    $SQL->bindValue('1',$username);
    $SQL->bindValue('2',$password);
    $SQL->execute();
    $info = $SQL->fetch();

    if ($SQL->rowCount() > 0) {
        session_start();
        $_SESSION['login'] = 1;
        $_SESSION['userid'] = $info['UserId'];
        //header('location: ../');
        exit;
    }
}
//header('location:../');
exit;

?>

