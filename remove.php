<?php
/**
 * Created by PhpStorm.
 * User: nuwan
 * Date: 31/05/2018
 * Time: 02:11
 */

$imgid=$_POST['id'];
session_start();
if (($key = array_search($imgid, $_SESSION['cart'])) !== false) {
    unset($_SESSION['cart'][$key]);
}
echo $imgid;
?>