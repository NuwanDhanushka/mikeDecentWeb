<?php
/**
 * Created by PhpStorm.
 * User: nuwan
 * Date: 31/05/2018
 * Time: 02:56
 */
session_start();
include('dbConfig.php');
$usrname=$_SESSION['user'];
$q2 = "SELECT userid FROM user WHERE firstname = '$usrname'";
$result2 = $mysqli->query($q2) or die(mysqli_error($mysqli));
$row2=mysqli_fetch_assoc($result2);

$userid=$row2["userid"];
$imgid=$_POST['id'];
$createdat=$_POST['creatd'];

$query ="DELETE FROM `comments`WHERE `created_at` = '$createdat' AND `userid` = $userid AND `imageid` = $imgid";
if (mysqli_query($mysqli, $query )) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($mysqli);
}
?>