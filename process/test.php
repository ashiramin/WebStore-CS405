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




//var_dump($SQL->execute());