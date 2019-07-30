<?php
/**
 * Created by PhpStorm.
 * User: nuwan
 * Date: 04/04/2018
 * Time: 15:37
 */

session_start();//creating a cart
$_SESSION['cart']=array();
 $_SESSION['loginerror'] =0;//storing login errors
include ('dbConfig.php');//db connection
if (isset($_SESSION['user'])) {
    header("Location: gallery.php");//if user is loged-in redirect to gallery
} else {
if(isset($_POST["submit"])) {
    $email = mysqli_real_escape_string($mysqli,$_POST['email']);//get email from form
    $password = mysqli_real_escape_string($mysqli,$_POST['password']);//get pass from form
    $q = "SELECT firstname, usertype FROM user WHERE email = '$email' AND password = '$password'";//check email and password
    $result = $mysqli->query($q) or die(mysqli_error($mysqli));
    $row=mysqli_fetch_assoc($result);
    if (!mysqli_num_rows($result) == 1) {
		$_SESSION['loginerror']=5;
        header("Location: login.php");
    } elseif ($row["usertype"]=="USER") {//if user loged in redirect to admin menu
        $_SESSION['user'] =$row["firstname"];
        $_SESSION['usertype'] = $row["usertype"];
        header("Location: userdash.php");
    } elseif ($row["usertype"]=="ADMIN") {//if admin loged in redirect to admin menu
        $_SESSION['user'] =$row["firstname"];
        $_SESSION['usertype'] = $row["usertype"];
        header("Location: admindash.php");
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
            @import url('https://fonts.googleapis.com/css?family=Titillium+Web');
            *, *:before, *:after {
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
            }

            html {
                overflow-y: scroll;
            }

            body {
                background: #ffffff;
                font-family: 'Titillium Web', sans-serif;
            }

            a {
                text-decoration: none;
                color: darkgray;
                -webkit-transition: .5s ease;
                transition: .5s ease;
            }
            a:hover {
                color: #000000;
            }

            .form {
                background:white;
                padding: 40px;
                max-width: 30vw;
                margin: 15vh auto;
                border-radius: 4px;
                -webkit-box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
                box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
            }

            .tab-group li a {
                display: block;
                text-decoration: none;
                padding: 15px;
                background: rgba(160, 179, 176, 0.25);
                color: #a0b3b0;
                font-size: 20px;
                float: left;
                width: 50%;
                text-align: center;
                cursor: pointer;
                -webkit-transition: .5s ease;
                transition: .5s ease;
            }
            .tab-group li a:hover {
                background: #000000;
                color: #000000;
            }
            .tab-group .active a {
                background: #000000;
                color: #000000;
            }

            h1 {
                text-align: center;
                color: #000000;
                font-weight: 300;
                margin: 0 0 40px;
            }

            input, textarea {
                font-size: 22px;
                display: block;
                width: 100%;
                height: 100%;
                padding: 5px 10px;
                background: none;
                background-image: none;
                border: 1px solid #a0b3b0;
                color: #000000;
                border-radius: 0;
                -webkit-transition: border-color .25s ease, -webkit-box-shadow .25s ease;
                transition: border-color .25s ease, -webkit-box-shadow .25s ease;
                transition: border-color .25s ease, box-shadow .25s ease;
                transition: border-color .25s ease, box-shadow .25s ease, -webkit-box-shadow .25s ease;
            }
            input:focus, textarea:focus {
                outline: 0;
                border-color: black;
            }

            textarea {
                border: 2px solid #a0b3b0;
                resize: vertical;
            }

            .field-wrap {
                position: relative;
                margin-bottom: 40px;
            }


            .top-row > div {
                float: left;
                width: 48%;
                margin-right: 4%;
            }
            .top-row > div:last-child {
                margin: 0;
            }

            .button {
                cursor:pointer;
                border: 0;
                outline: none;
                border-radius: 0;
                padding: 15px 0;
                font-size: 2rem;
                font-weight: 600;
                text-transform: uppercase;
                background: white;
                color: #000000;
                -webkit-transition: all 0.5s ease;
                transition: all 0.5s ease;
                -webkit-appearance: none;
            }
            .button:hover, .button:focus {
                background: #000000;
                color: #ffffff;
            }

            .button-block {
                display: block;
                width: 50%;

            }

            .forgot {
                margin-top: -20px;
                text-align: right;
            }
            #signup{
                text-decoration: none;
                color: #0d95e8;
            }
        </style>
    </head>
    <body>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <div class="form">
            <div class="tab-content">
                <div id="login">
                    <div style="line-height:20%;">
                        <p></p>
                    <h1>Welcome Back!</h1>
                    <h1>Sign in</h1></div>
                    <h1 style="font-size: 1.2em;line-height:2%;">Not a member <a id="signup" href="signup.php">Sign up here</a></h1>
                    <form action="login.php" method="post">
                        <div class="field-wrap">
                            <input type="email" name="email" required  placeholder="Email *"/>
                        </div>
                        <div class="field-wrap">
                            <input type="password" name="password" required placeholder="Password *"/>
                        </div>
                        <p class="forgot"><a href="#">Forgot Password?</a></p>
						<p class="forgot"><?php if ($_SESSION['loginerror'] > 1){echo'Wrong Password or Email';}?></p>
						
                        <input  class="button button-block" name="submit" type="submit" value="login" style="float: right;"/>
                        <input  class="button button-block" name="gobacl" type="button" value="go back" onclick="location.href = 'index.php';"/>
                    </form>
                </div>
            </div><!-- tab-content -->
        </div> <!-- /form -->
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
