<?php
/**
 * Created by PhpStorm.
 * User: ashir
 * Date: 3/22/16
 * Time: 5:25 PM
 */
session_start();
if(!isset($_SESSION['login']) || (trim($_SESSION['login']) == '')) {
    header("location: signin.php");
    exit();
}

