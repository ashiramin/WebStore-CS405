<?php
/**
 * Created by PhpStorm.
 * User: ashir
 * Date: 3/31/16
 * Time: 3:41 PM
 */

require 'config/conn.php';
require 'include/header.php';
$SQL = $conn->prepare("Select * from ProductOrder Where Username = ? ORDER  BY OrderDate DESC, ShippingDate");
$SQL->bindValue('1',$_SESSION['userid']);
$SQL->execute();





?>

<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>Order Id</th>
        <th>Price</th>
        <th>Order Date</th>
        <th>Status</th>
        <th>Shipping Date</th>
    </tr>
    </thead>
    <tbody>
    <?php
    while ($info = $SQL->fetch()) {
        ?>
        <tr>
            <td><?=$info["Id"]?></td>
            <td><?=$info["total"]?></td>
            <td>
                <?=$info["OrderDate"]?>
            </td>
            <td>
                <?=$info['Status'] ==0 ? "Pending" : "Shipped"?>

            </td>
            <td>
                <?=$info['Status'] ==0 ? "Not Applicable" : $info["ShippingDate"] ?>

            </td>
        </tr>
        <?
    }
    ?>

    </tbody>
</table>

<?
require  'include/footer.php'
?>

