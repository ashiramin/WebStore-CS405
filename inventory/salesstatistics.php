<?php
/**
 * Created by PhpStorm.
 * User: ashir
 * Date: 4/1/16
 * Time: 11:08 AM
 */
?>

<?php
require '../config/conn.php';
require '../include/header.php';
require '../include/auth.php';
require '../include/authorize.php';

$os = array("Manager");

if (!in_array($_SESSION['role'],$os)) {
    header("location: index.php");
    //$a  = $_SESSION['role'] != "Manager";
    //var_dump($a);
    exit();
}

$SQL = $conn->prepare("Select * from ProductOrder where  Status <> '0' Order By total Desc, ShippingDate Desc");


$SQL->execute();

?>

<table class="table table-striped table-bordered"   >
    <thead>
    <tr>
        <th>Username</th>
        <th>Total</th>
        <th>Shipping Date</th>
    </tr>
    </thead>
    <tbody>
    <?php
    while ($info = $SQL->fetch()) {
        ?>
        <tr>
            <td><?=$info["Username"]?></td>
            <td><?=$info["total"]?></td>
            <td>
                <span><?=$info["ShippingDate"]?></span>
            </td>
        </tr>
        <?
    }
    ?>

    </tbody>
</table>

<?php
require '../include/footer.php';
?>
