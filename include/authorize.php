<?php
/**
 * Created by PhpStorm.
 * User: ashir
 * Date: 3/25/16
 * Time: 4:49 AM
 */

include "../config/conn.php";
session_start();
$SQL = $conn->prepare('Select * From Permission');
$SQL->execute();
$permissionArray = $SQL->fetchAll();

$SQL = $conn->prepare('Select p1.Action From Permission p1, Role p2 , User p3
                        where p1.Id = p2.PermissionId AND p2.Id = p3.RoleId AND p3.Username = ? ');


$SQL->bindValue('1',$_SESSION["userid"]);

$SQL->execute();
//print_r($SQL->rowCount());
$userPermissions = $SQL->fetchAll();
//print_r($userPermissions[0]["Action"]);
//var_dump($userPermissions);
//var_dump(array_search("AddPromotion",array_column($permissionArray,"Action")));
//var_dump($userPermissions);

$pagesToActionsMapping = [
  "Purchase" => "purchase.php",
    "updateInventory" => "updateinventory.php"
];

print_r(isset($pagesToActionsMapping["purchase.php"]) == null);