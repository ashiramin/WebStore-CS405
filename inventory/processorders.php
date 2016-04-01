<?php
/**
 * Created by PhpStorm.
 * User: ashir
 * Date: 3/28/16
 * Time: 11:12 AM
 */

require "../config/conn.php";

$Username = $_POST["username"];
$Id = $_POST["id"];
$SQL = $conn->prepare("Update ProductOrder Set Status = 1,ShippingDate = ? where Id = ?");
$SQL->bindValue("2",$Id);
$date = date('Y-m-d',strtotime("+6 Days"));

$SQL->bindValue("1",$date);

$SQL->execute();

$SQL = $conn->prepare("SELECT (Product.Qty - OrderLines.Qty) as 'total', Product.Name FROM `OrderLines`
                    INNER JOIN `Product` on Product.Id = OrderLines.ProductId Where OrderLines.OrderId = ?");

$SQL = $conn->prepare("Update Product p INNER JOIN OrderLines  o on p.Id = o.ProductId
                    Set p.Qty =(p.Qty - o.Qty) WHERE o.OrderId = ? ");

$SQL->bindValue("1",$Id);

$SQL->execute();