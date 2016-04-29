<?php
/**
 * Created by PhpStorm.
 * User: ashir
 * Date: 4/1/16
 * Time: 3:16 PM
 */


require "../config/conn.php";

session_start();

$id = $_POST["id"];

$discount = $_POST["discount"];


if ($discount == 0) {
    echo ($id);
    $SQL = $conn->prepare("Delete from Promotion where ProductID = ?");
    $SQL->bindValue("1",$id);
    $SQL->execute();
}
else {
    $SQL = $conn->prepare("Select * from Promotion where ProductID = ?");
    $SQL->bindValue("1",$id);
    $SQL->execute();

    if ($SQL->rowCount() > 0) {
        $SQL = $conn->prepare("Update Promotion Set Discount = ? where ProductID = ?");
        $SQL->bindValue("1",$discount);
        $SQL->bindValue("2",$id);
    }
    else {
        //echo $_POST["prodID"];
        $SQL = $conn->prepare("Insert INTO Promotion(Username,Discount,ProductID)  VALUES(?,?,?)");
        $SQL->bindValue("1",$_SESSION['userid']);
        $SQL->bindValue("2",$discount);
        $SQL->bindValue("3",$id);
        //$SQL->bindValue("2",$_POST["id"]);
    }


}


$SQL->execute();