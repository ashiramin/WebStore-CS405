<?php
/**
 * Created by PhpStorm.
 * User: ashir
 * Date: 3/25/16
 * Time: 2:14 PM
 */
session_start();

$_SESSION["cart"][$_POST["Id"]] = $_POST["Qty"];


var_dump($_SESSION["cart"]["1"]);

?>


