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
    <link rel="stylesheet" href="dist/aos.css" />
    <script src="dist/aos.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Mina');
        @import url('https://fonts.googleapis.com/css?family=Dawning+of+a+New+Day');
        @import url('https://fonts.googleapis.com/css?family=Julius+Sans+One');
        @font-face {
            font-family:"Frutilla";
            src: url("fonts/Frutilla Script.ttf")}
        body {
            overflow-x: hidden;
        }

        nav {

            z-index: 999;
            font-family: 'Mina', sans-serif;
            background-color: white;
            font-size: 1.7em;
            margin: 0;
            overflow: hidden;
            text-transform: uppercase;
            text-align: center;
            position: fixed;
            width: 100%;

        }

        nav ul {
            margin: 0;
            padding: 0;
        }

        nav ul li {
            /* This allow us to arrange list items in a row, without using float */
            display: inline-block;
            list-style-type: none;
        }

        /* Create a style for the first level items */

        nav>ul>li>a {
            color: black;
            background-color: white;
            display: block;
            line-height: 2em;
            padding: 0.5em 0.5em;
            text-decoration: none;
        }

        nav>ul>li>a:hover {
            color: white;
            background-color: black;
            display: block;
            line-height: 2em;
            padding: 0.5em 0.5em;
            text-decoration: none;
        }

        #bgvid {
            position: relative;
            display: block;
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            object-fit: fill;
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

        input[type=text]:focus,
        textarea:focus {
            border: 3px solid #555;
        }

        input[type=submit] {
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

        input[type=submit]:hover {
            background-color: black;
            border: none;
            color: white;
            padding: 16px 32px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
        }

    </style>
</head>

<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- Add your site or application content here -->
<div>
    <nav>
        <ul>
            <li>
                <a class="menu" href="#home">Home</a>
            </li>
            <li>
                <a class="menu" href="#about">About</a>
            </li>
            <li>
                <a class="menu" href="#Photo-Store">Photo Store</a>
            </li>
            <li>
                <a class="menu" href="#contact">Contact</a>
            </li>

        </ul>
    </nav>
</div>
<div id="home" style="width: 100%;background-color: black;height: 110vh;">
    <div>
        <video id="bgvid" loop="loop" autoplay="autoplay">
            <source src="videos/intro.mp4" type="video/mp4">
        </video>
    </div>
</div>
<div id="about" style="width: 100%;background-color: black;background-image: url(img/photographer.png);background-repeat: no-repeat;background-position: -20vh 0; height: 100vh;z-index:200;">
    <div style="float: right;width: 40%;margin-right: -8vh;">
        <h1 style="letter-spacing: 0.5em;text-transform: uppercase;color: white;font-family: 'Mina', sans-serif;margin-right: 28vw;margin-top: 15vh;"
            data-aos="fade-left" data-aos-duration="500">about</h1>
        <h1 style="font-family: 'Dawning of a New Day', cursive;color: white;font-size:3em;text-align: center;margin-right:4vw;"
            data-aos="fade-left" data-aos-duration="700">Mike Decent</h1>
        <p style="font-family: 'Julius Sans One', sans-serif;color: white;text-align: center;font-size:1.2em;margin-right:5vw;" data-aos="fade-left"
           data-aos-duration="1000">
            A lifelong passion, Mike Decent’s photography is as much a pleasure as it is a business. From weddings and portraits to commercial
            and media, his work is at once edgy and earthy, funky and fashionable. With his European heritage and unique
            professional background, He does things differently than another photographers might. Beyond simply taking
            a nice picture, He take a step back to observe and capture all of the emotion and unique details of your
            occasion.
        </p>
    </div>
</div>
<div id="Photo-Store" style="width: 100%;background-color:white;height: 100vh;border: black 1px solid;">
    <p style="font-family: 'Julius Sans One', sans-serif;font-size: 4.8em;text-align: center;margin-top: 15%;" data-aos="fade-top" data-aos-duration="500">
        Looking for awesome pictures ?
    </p>
    <p style="font-family: 'Julius Sans One', sans-serif;font-size: 4.8em;text-align: center;cursor: pointer;" data-aos="fade-top" data-aos-duration="500">
        <a href="login.php"style="text-decoration: none;color: black;">Click Here</a>
    </p>
</div>
<div id="contact" style="width: 100%;background-color:white;height: 100vh;">
    <div style="border: rgb(255, 255, 255) 1px solid;height:100% ;">
        <h1 style="letter-spacing: 0.5em;text-transform: uppercase;color: black;font-family: 'Mina', sans-serif;margin-left: 8vw;margin-top: 13vh;"
            data-aos="fade-right" data-aos-duration="500">contact</h1>
        <div style="float:right;width: 40%;margin-right: 2vw;margin-top: 5vh;">
            <p style="font-family: 'Julius Sans One', sans-serif;font-size: 1.4em;text-align: center;" data-aos="fade-left" data-aos-duration="500">
                If you have any enquiry about my images or have any project in mind that you think I might fit into, please feel free to
                contact me using this form. For non-work related emails I will say that, while I love to hear from everybody,
                I don't always have the time to chat, or answer questions, or do interviews. I will definitely do my
                best to answer, but, please be aware that it might not be right away.
            </p>
            <h1 style="font-family:Frutilla;font-size:5em;text-align: right;margin-top: -2vh;margin-right: 5vw;" data-aos="fade-left" data-aos-duration="800">Mike Decent</h1>
        </div>
        <div style="width: 40%;height:66%;margin-left: 10vw;margin-top: 4vh;border: black 2px solid;padding: 2%;" data-aos="fade-right"
             data-aos-duration="800">
            <form>
                <div>
                    <input type="text" name="firstname" placeholder="First Name" style="display: inline;" required>
                    <input type="text" name="lastname" placeholder="Last Name" style="display: inline;float: right;" required>
                </div>
                <div>
                    <input type="text" name="subject" placeholder="Subject" required>
                    <input type="text" name="email" type="email" placeholder="Email" size="40" required>
                    <textarea name="message" placeholder="Type Here" rows="10" cols="60" required></textarea>
                </div>
                <div style="float:right;">
                    <input id="submit" name="submit" type="submit" value="SEND" style="font-family:'Mina', sans-serif;">
                </div>
            </form>
        </div>
    </div>
<!--</div>
<div style="width: 100%;background-color:blueviolet;height: 100vh;"></div>-->


<script src="js/vendor/modernizr-3.5.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
<script>
    window.jQuery || document.write('<script src="js/vendor/jquery-3.2.1.min.js"><\/script>')

</script>
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
<script>
    AOS.init();

</script>
<script>
    $(document).ready(function () {
        $(".menu").on("click", function (e) {

            e.preventDefault();

            $("body, html").animate({
                scrollTop: $($(this).attr('href')).offset().top
            }, 600);

        });
    });

</script>
</body>

</html>
