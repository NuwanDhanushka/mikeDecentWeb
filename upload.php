<?php
/**
 * Created by PhpStorm.
 * User: nuwan
 * Date: 22/03/2018
 * Time: 15:14
 */

session_start();
if ($_SESSION['usertype']=="ADMIN") {

} else {
    header("Location: login.php");
}
include ('dbConfig.php');
if(isset($_POST["submit"])) {
    if($_POST['newcategory']=='')
    {$category =$_POST['category'];}
    else{$category =$_POST['newcategory'];}


    $name = $_FILES['image']['name'];
    list($txt, $ext) = explode(".", $name);
    $image_name = time().".".$ext;
    $tmp = $_FILES['image']['tmp_name'];
        if ($_FILES["image"]["error"] > 0) {
            echo "Return Code:" . $_FILES["image"]["error"] . "<br />";
            echo $_FILES["image"]["error"] ;
        } else {
            $i = 1;
            $success = false;
            while (!$success) {
                if (file_exists("images/" . $image_name)) {
                    $i++;
                    $image_name = "$i" . $name;
                } else {
                    $success = true;
                }
            }
            move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $image_name);
            echo "Stored in: " . "imges/" . $image_name;
            echo "<br />";
            $sql = "INSERT INTO image(imageid,title, image,created_at,category,price) VALUES (NULL ,'" . $_POST['title'] . "', '" . $image_name . "',now(),'" . $category . "','".$_POST['price']."')";
            if (!mysqli_query($mysqli,$sql)) {
                die("An error" . mysqli_error($mysqli));
            } else {
                echo "1 row added";
            }
        }

}
?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <style>
	   @import url('https://fonts.googleapis.com/css?family=Julius+Sans+One');
        body {
            background: #ffffff;
            font-family: 'Titillium Web', sans-serif;
        }
        input[type=text],
        textarea {
            font-family: 'Mina', sans-serif;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 3px solid #ccc;
            -webkit-transition: 0.5s;
            transition: 0.5s;
            outline: none;
            display: block;
        }
		h1{
			font-family: 'Julius Sans One', sans-serif;
		}

        input[type=text]:focus,
        textarea:focus {
            border: 3px solid #555;
        }

        input[type=submit],input[type=file] {
            background-color: gainsboro;
            border: none;
            color: black;
            padding: 16px 32px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
            -webkit-transition: 0.5s;
            transition: 0.5s;
        }

        input[type=submit]:hover,input[type=file]:hover {
            background-color: black;
            border: none;
            color: white;
            padding: 16px 32px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
        }

        .top-right{
            float: right;
        }
        .lilmenu{

        }
        .lilmenu>a{
            color: white;
                background-color: #2a2a2a;
                line-height: 2em;
                padding: 0.5em 0.5em;
                text-decoration: none;
                width: 100px;
                height: 100px
        }

        .lilmenu>a:hover {
         color: white;
                background-color: #08e56f;
                line-height: 2em;
                padding: 0.5em 0.5em;
                text-decoration: none;
        }
			@font-face {
        font-family:"Frutilla";
        src: url("fonts/Frutilla Script.ttf")}
		
    </style>
</head>
<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- Add your site or application content here -->
<div style="background-color: #2a2a2a;color: white;border: #2a2a2a 1px solid;height: 13vh;">
    <h1 style="margin-left: 5vw;margin-top: -3vh;font-size: 5em;font-family:Frutilla;">Upload Images</h1>
    <div class="top-right" style="height: 100%;width: 15%;margin-top: -20vh;text-align:right;">
        <div class="lilmenu">
            <a href="admindash.php" style="margin-top: -10vh;width:66px;">Menu</a>
        </div>
        <div class="lilmenu" style="margin-top: 1vh;">
            <a href="logout.php">Log out</a>
        </div>
		
    </div>
	<img src="img/backgroundsplash2.jpg" style="width:600px;height:470px;float:right;margin-right:50px;">
<form action="upload.php" class="form-image-upload" method="POST" enctype="multipart/form-data">
    <div style="margin: 50px 250px;">
        <div>
            <h1 style="color: black;margin-left:-5vw; ">Title:</h1>
            <input type="text" name="title" placeholder="Title" required>
        </div>
        <div>
            <h1 style="color: black;margin-left:-5vw; ">Image:</h1>
            <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg" />
        </div>
        <h1 style="color: black;margin-left:-5vw; ">Price:</h1>
        <input type="number" min="1" step="any" name="price" />
        <div>
            <h1 style="color: black;margin-left:-5vw; ">Category:</h1>
            <select name="category">
            <?php
            $query = $mysqli->query("SELECT DISTINCT category FROM image ");
            if($query->num_rows > 0){
                while($row = $query->fetch_assoc()){
                    ?>
                        <option><?php echo $row["category"]; ?></option>
            <?php }
            }?>
                </select>
            <input type="text" name="newcategory" placeholder="New category">
        </div>
        <div>
		
            <br/>
            <input name="submit" type="submit" value="Upload"/>
        </div>
    </div>
</form>
</div>
<script src="js/vendor/modernizr-3.5.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-3.2.1.min.js"><\/script>')</script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>

<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
<script>
    window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
    ga('create','UA-XXXXX-Y','auto');ga('send','pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>
</html>
