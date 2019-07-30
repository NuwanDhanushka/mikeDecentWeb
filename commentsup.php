<?php
session_start();
include('dbConfig.php');
echo $_SESSION['user'];
$userid=$_SESSION['user'];
$q2 = "SELECT userid FROM user WHERE firstname = '$userid'";
$result2 = $mysqli->query($q2) or die(mysqli_error($mysqli));
$row2=mysqli_fetch_assoc($result2);
if(isset($_POST["submit"])) {
    $imgid = mysqli_real_escape_string($mysqli,$_POST['var']);
$sql = "INSERT INTO comments (commentid, comment, created_at, userid, imageid) VALUES (NULL ,'" . $_POST['comment'] . "',now(), '".$row2["userid"]."','".$imgid."')";
if (!mysqli_query($mysqli,$sql)) {
die("An error" . mysqli_error($mysqli));
} else {
echo "1 row added";
    header("Location: gallery.php");
 }
}
?>

