<?php
/**
 * Created by PhpStorm.
 * User: ashir
 * Date: 3/25/16
 * Time: 5:49 PM
 */
session_start();

foreach ($_POST as $key => $value) {

    if ($value == 0) {
        unset($_SESSION["cart"][$key]);
    }
    else {
        $_SESSION["cart"][$key] = $value;
    }


}

?>