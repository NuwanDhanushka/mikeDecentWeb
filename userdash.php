<?php
/**
 * Created by PhpStorm.
 * User: nuwan
 * Date: 04/04/2018
 * Time: 16:37
 */
session_start();
if (isset($_SESSION['user'])) {

} else {
    header("Location: login.php");
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
        .tabs{
            font-size: 0.7em;
            font-family: 'Julius Sans One', sans-serif;
            border: black 1px solid;
            width: 20vw;
            margin-bottom: 5vh;
            padding: 0.5vw;
            text-align: center;
            text-transform: uppercase;
            cursor: pointer;
        }
        .top-right{
            float: right;
        }
        .lilmenu{
			float:right;
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
        a{
            text-decoration: none;
            color: black;
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
    <div class="top-right" style="height: 100%;width: 15%;margin-top:5px;">
        <div class="lilmenu">
            <a href="index.php"style="margin-top: -5vh;width:66px;margin-right:10px;">Home</a>
        </div>
        <div class="lilmenu"style="margin-top: 5.8vh;margin-right:-58px;">
            <a href="logout.php">Log out</a>
        </div>
    </div>
    <h1 style="margin-left: 5vw;margin-top: -4vh;font-size: 6em;color: white;font-family:Frutilla;">User Menu</h1>

</div>
<img src="img/backgroundsplash.jpg" style="width:600px;height:450px;float:right;">
<div style="margin-left: 10vw;margin-top: 6vw;">
    <div class="tabs">
        <h1> <a href="gallery.php">View Pictures</a></h1>
    </div>
    <div class="tabs">
        <h1> <a href="viewcart.php">View Cart</a></h1>
    </div>
</div>
<script src="js/vendor/modernizr-3.5.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-3.2.1.min.js"><\/script>')</script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>

<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
<script>
    window.ga = function () {
        ga.q.push(arguments)
    };
    ga.q = [];
    ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto');
    ga('send', 'pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>
</html>
