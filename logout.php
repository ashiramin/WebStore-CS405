<?php
/**
 * Created by PhpStorm.
 * User: ashir
 * Date: 3/22/16
 * Time: 6:37 PM
 */

session_start();
unset($_SESSION["login"]);
session_destroy();
header("Location: index.php");
exit;
?>