<?php
/**
 * Created by PhpStorm.
 * User: nuwan
 * Date: 29/05/2018
 * Time: 20:47
 */
session_start();
foreach($_SESSION['cart'] as $key=>$value)
{
    // and print out the values
    echo 'The value of $_SESSION['."'".$key."'".'] is '."'".$value."'".' <br />';
}

?>