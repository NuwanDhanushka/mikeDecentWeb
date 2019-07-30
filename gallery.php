<?php
session_start();
if (isset($_SESSION['user'])) {

} else {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en-US">
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
    <link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox.css">

    <style type="text/css">

        .gallery img {
            width: 20%;
            height: auto;
            border-radius: 5px;
            cursor: pointer;
            transition: .3s;
        }
        /* Custom button design */
        .fancybox-toolbar .fancybox-button {
            background: transparent;
            color: #333;
        }

        .fancybox-toolbar .fancybox-button:hover:not([disabled]) {
            background: rgba(223, 223, 223, 0.5);
            color: #c11c95;
        }

        .fancybox-navigation .fancybox-button:before {
            display: none;
        }

        .fancybox-navigation .fancybox-button {
            color: #444 !important;
            padding: 7px;
            z-index: 99996;
        }


        /* Make close button a bit bigger */
        .fancybox-button--close {
            padding: 7px;
        }

        /* Change background color */
        .fancybox-bg {
            background: #eee;
        }

        /* Hide caption initially */
        .caption {
            display: none;
        }

        /* Change position and design of caption area */
        .fancybox-caption-wrap {
            top: 0;
            right: 0;
            bottom: 0;
            left: auto;
            width: 300px;
            padding-top: 40px;
            z-index: 99996;
            background: #eee;
            box-shadow: 0 0 20px #888;

            /* Make caption clickable */
            pointer-events: all;

            /* Hide next to right edge */
            transform: translate3d(320px, 0, 0);
        }

        /* Overwrite the default animation */
        .fancybox-show-caption .fancybox-caption-wrap,
        .fancybox-caption-wrap {
            transition: transform .2s;
        }

        /* Reveal caption */
        .fancybox-show-caption.fancybox-vertical-caption .fancybox-caption-wrap {
            transform: translate3d(0, 0, 0);
        }

        /* Styling of caption content */
        .fancybox-caption {
            height: 100%;
            padding: 0;
            border: 0;
            color: #222;
            overflow: auto;
        }

        .fancybox-caption a {
            color: #333;
        }

        .fancy-nav a {
            text-decoration: none;
            font-weight: normal;
            font-size: 20px;
            font-family: 'Montserrat', 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background: #444;
            color: #fff;
            border-radius: 50%;
            display: inline-block;
            width: 22px;
            height: 22px;
            line-height: 18px;
            text-align: center;
            -moz-user-select: none;
            user-select: none;
            vertical-align: baseline;
        }



    </style>

<style>
    @import url('https://fonts.googleapis.com/css?family=Mina');
    input[type=text]{
        font-family: 'Mina', sans-serif;
        font-size: 2em;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 3px solid #ccc;
        -webkit-transition: 0.5s;
        transition: 0.5s;
        outline: none;
        display: block;
        width: 30vw;
        height: 50px;
        border-radius: 5px;
    }

    input[type=text]:focus{
        border: 3px solid #555;
    }
    img{
        margin: 5px;
    }
    .lilmenu{
        float: right;
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
    .stars {
        cursor: pointer;
    }
    .stars:hover .star polygon {
        fill: #ffd055 !important;
    }
    .stars .star {
        float: left;
    }
    .stars .star polygon {
        fill: #d8d8d8;
    }
    .stars .star:hover ~ .star polygon {
        fill: #d8d8d8 !important;
    }
    .stars[data-stars] .star polygon {
        fill: #ffd055;
    }
    .stars[data-stars="1"] .star:nth-child(1) ~ .star polygon {
        fill: #d8d8d8;
    }
    .stars[data-stars="2"] .star:nth-child(2) ~ .star polygon {
        fill: #d8d8d8;
    }
    .stars[data-stars="3"] .star:nth-child(3) ~ .star polygon {
        fill: #d8d8d8;
    }
    .stars[data-stars="4"] .star:nth-child(4) ~ .star polygon {
        fill: #d8d8d8;
    }
    .stars[data-stars="5"] .star:nth-child(5) ~ .star polygon {
        fill: #d8d8d8;
    }
    @font-face {
        font-family:"Frutilla";
        src: url("fonts/Frutilla Script.ttf")}
</style>
</head>
<body>
<div class="container">
    <div style="background-color: #2a2a2a;color: white;border: #2a2a2a 1px solid;height: 13vh;margin-top: 0;">
        <h1 style="margin-left: 5vw;margin-top: -3vh;font-size: 5em;color: white;font-family:Frutilla;float: left;">Photo Gallery</h1>
        <div style="margin-top: 3vh;margin-left: 30vw;">
        <input type="text" name="search_text" id="search_text" placeholder="Search"/>
            <div style="margin-left: 32vw;margin-top: -5vh;">
            <strong style="font-family: 'Mina', sans-serif;">Category:</strong>
            <select name="category" id="category">
                <option>All</option>
                <?php
                include('dbConfig.php');
                $query = $mysqli->query("SELECT DISTINCT category FROM image ");
                if($query->num_rows > 0){
                    while($row = $query->fetch_assoc()){
                        ?>
                        <option><?php echo $row["category"]; ?></option>
                    <?php }
                }?>
            </select>
            </div>
            <div class="lilmenu" style="margin-top: -8vh;width:66px;">
                <a href="<?php if($_SESSION['usertype']=="ADMIN"){echo'admindash.php';}else{echo'userdash.php';} ?>">Menu</a>
            </div>
            <div class="lilmenu" style="margin-top: -2.8vh;">
                <a href="logout.php">Log out</a>
            </div>
        </div>
    </div>
    <div class="gallery" style="clear: both;">
    </div>
</div>
<script src="js/vendor/jquery-3.2.1.min.js"></script>
<script src="fancybox/jquery.fancybox.js"></script>
<script>
    $(document).ready(function(){

        load_data();

        function load_data(query,cat,type)//get searching data via ajax
        {

            $.ajax({
                url:"fetchdata.php",
                method:"POST",
                data:{query:query,category:cat,type:type},
                success:function(data)
                {
                    $('.gallery').html(data);
                }
            });
        }
        $('#search_text').keyup(function(){//search bar
            var search = $(this).val();
            var cat = $('#category').find(":selected").text();
            var type="s";
            if(search != '')
            {

                load_data(search,cat,type);
            }
            else
            {
                load_data();
            }
        });

        $('#category').change(function(){ //search by category
            var search = $(this).val();
            var cat = $('#category').find(":selected").text();
            var type="c";
            if(search != '')
            {

                load_data(search,cat,type);
            }
            else
            {
                load_data();
            }
        });


    });
</script>
<script>
   // $('#category').change(function() {
  //      var Category = $(this).find(":selected").text();
   //     console.log(Category);
  //      $('.'+Category).show();
  //  });

</script>

<style>
    .imglist{

        margin-left: 15vw;
        margin-top: 12vh;
    }
</style>
</body>
</html>