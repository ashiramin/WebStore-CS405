<?php
/**
 * Created by PhpStorm.
 * User: ashir
 * Date: 3/25/16
 * Time: 4:49 AM
 */

include "../config/conn.php";
include "auth.php";
$SQL = $conn->prepare('Select * From Permission');
$SQL->execute();
$permissionArray = $SQL->fetchAll();

$SQL = $conn->prepare('Select Name from User t1 , Role t2  where t1.RoleId = t2.Id and t1.Username = ? ');


$SQL->bindValue('1',$_SESSION["userid"]);

$SQL->execute();
//print_r($SQL->rowCount());
$userPermissions = $SQL->fetch();


$_SESSION["role"] = $userPermissions["Name"];