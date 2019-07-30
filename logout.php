<?php
/**
 * Created by PhpStorm.
 * User: nuwan
 * Date: 04/04/2018
 * Time: 17:44
 */
session_start();
unset($_SESSION["user"]);
unset($_SESSION["usertype"]);
unset($_SESSION["cart"]);
session_destroy;
header("Location: login.php");
?>