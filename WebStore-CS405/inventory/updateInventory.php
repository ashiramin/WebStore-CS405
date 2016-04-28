<?php
/**
 * Created by PhpStorm.
 * User: ashir
 * Date: 3/28/16
 * Time: 11:12 AM
 */

require "../config/conn.php";

$Id = $_POST["Id"];
$Qty = $_POST["Qty"];

$SQL = $conn->prepare("Update Product Set Qty = ? where Id = ?");
$SQL->bindValue("1",$Qty);
$SQL->bindValue("2",$Id);

$SQL->execute();