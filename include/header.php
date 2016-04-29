<?php
/**
 * Created by PhpStorm.
 * User: ashir
 * Date: 3/22/16
 * Time: 3:57 PM
 */
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css" href="/WebStore-CS405/assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="/WebStore-CS405/assets/css/custom.css"/>
    <link rel="stylesheet" type="text/css" href="http://blackrockdigital.github.io/startbootstrap-shop-homepage/css/shop-homepage.css"/>
</head>

<body>

<nav class="navbar">
    <div class="container">
        <a class="navbar-brand" href="/WebStore-CS405/">Webstore</a>
        <div class="dropdown nav navbar-nav navbar-right">
            <a class="dropdown-toggle btn btn-lg btn-default" data-toggle="dropdown"  aria-expanded="false">
                <i class="fa fa-cog fa-lg"></i> <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="/WebStore-CS405/orderstatus.php"><i class=""></i>Order Status</a></li>
                <?
                 if (isset($_SESSION['login'])) {
                    ?>
                     <li><a href="/WebStore-CS405/logout.php"><i class="fa fa-sign-out fa-lg"></i> Log Off</a></li>
                    <?
                 }
                else {
                    ?>
                    <li><a href="/WebStore-CS405/signin.php"><i class="fa fa-sign-out fa-lg"></i> Log in</a></li>
                    <?
                }

                ?>

            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid breadcrumbBox text-center">
    <ol class="breadcrumb">
        <?
         if (strpos($_SERVER['REQUEST_URI'],"inventory") === false) {
             ?>
             <li><a href="/WebStore-CS405/">Browse Store</a></li>
             <li><a href="/WebStore-CS405/order.php">Order</a></li>
             <li><a href="/WebStore-CS405/checkout.php">Checkout</a></li>
            <?
         }
        else {
            ?>
            <li><a href="/WebStore-CS405/inventory/">Inventory</a></li>
            <li><a href="/WebStore-CS405/inventory/pendingorders.php">Shipping Orders</a></li>
            <li><a href="/WebStore-CS405/inventory/promotions.php">Promotions</a></li>
            <li><a href="/WebStore-CS405/inventory/salesstatistics.php">Statistics</a></li>

            <?
        }
        ?>

    </ol>
</div>



<div class="container">






