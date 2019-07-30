<?php
/**
 * Created by PhpStorm.
 * User: nuwan
 * Date: 29/05/2018
 * Time: 20:10
 */
session_start();
if(isset($_POST['product'])) {
    $item = $_POST['product'];
    array_push($_SESSION['cart'], $item);
    $_SESSION['cart']=array_unique($_SESSION['cart']);
}
?>

