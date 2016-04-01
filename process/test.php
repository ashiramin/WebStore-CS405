<?php
/**
 * Created by PhpStorm.
 * User: ashir
 * Date: 3/25/16
 * Time: 2:22 PM
 */
session_start();
//unset($_SESSION["cart"]["1"]);
print_r($_SESSION["cart"]);


require '../config/conn.php';

//session_start();
$cart = $_SESSION["cart"];
$total =0;

//$SQL = $conn->prepare("Select Price * ? as total , Name from Product where Id = ?");
    try {
        $SQL = $conn->prepare("SELECT
                                (CASE
                                WHEN Promotion.Discount is null THEN Product.Price * ?
                                WHEN Promotion.Discount is not NULL Then Product.Price*(1 - Promotion.Discount) * ?
                                END) as Price, Product.Name, Product.Price as RealPrice
                                 FROM Product
                                LEFT OUTER JOIN Promotion on Product.Id = Promotion.ProductID
                                where Product.Id in (1,2)");

       // $SQL = $conn->prepare("Select * from Promotion");

        $SQL->bindValue("1", 2);
        $SQL->bindValue("2", 2);
        //$SQL->bindValue("2", $prodID);
        $SQL->execute();
        $info = $SQL->fetch();
        var_dump($info);
        //echo "Successfully added the new user " . $_POST['name'];
    } catch (PDOException $e) {
        echo "DataBase Error: The user could not be added.<br>".$e->getMessage();
    } catch (Exception $e) {
        echo "General Error: The user could not be added.<br>".$e->getMessage();
    }

    print_r($info);
    $total += $info["total"];


//var_dump($SQL->execute());