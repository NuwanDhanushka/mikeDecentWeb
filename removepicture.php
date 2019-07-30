<?php
/**
 * Created by PhpStorm.
 * User: nuwan
 * Date: 31/05/2018
 * Time: 02:56
 */
session_start();
include('dbConfig.php');
$imgid=$_POST['id'];
$imageURL=$_POST['url'];
$query ="DELETE FROM `image`WHERE `imageid` = $imgid";
if (!unlink($imageURL))
  {
  echo ("Error deleting $imageURL");
  }
else
  {
  echo ("Deleted $imageURL");
  }
if (mysqli_query($mysqli, $query )) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($mysqli);
}
?>