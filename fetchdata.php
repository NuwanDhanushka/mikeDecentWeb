<?php
/**
 * Created by PhpStorm.
 * User: nuwan
* Date: 03/04/2018
* Time: 19:10
*/
session_start();
//fetch.php
include('dbConfig.php');
if(isset($_POST["query"],$_POST["category"],$_POST["type"]))
{
    $search = mysqli_real_escape_string($mysqli, $_POST["query"]);
    $cat = mysqli_real_escape_string($mysqli, $_POST["category"]);


    if($_POST["category"]=='All'&& $_POST["type"]=="c"){
        $query = $mysqli->query("SELECT * FROM image ORDER BY created_at DESC ");
    }
    else{
        $query = $mysqli->query("SELECT * FROM image WHERE category = '" . $cat . "'");
    }
}
else
{
    $query = $mysqli->query("SELECT * FROM image ORDER BY created_at DESC");
}
if(isset($_POST["type"])){
        if($_POST["type"]=="s"){
    $query = $mysqli->query("SELECT * FROM image WHERE title LIKE '%" . $search . "%'");
}}
if($query->num_rows > 0)//inserting items to data base 
{

    echo "<div class=\"imglist\">";

    while($row = $query->fetch_assoc())
    {
        $imageURL = 'images/'.$row["image"];
        ?>
        <a href="<?php echo $imageURL; ?>" data-fancybox="images" data-caption="<?php echo $row["title"];  ?>" class="<?php echo $row["category"];  ?>">
            <img src="<?php echo $imageURL; ?>" alt="" class="<?php echo $row["category"];  ?>"  />
            <div class="caption">
				<?php if($_SESSION['usertype']=="ADMIN"){
                           ?>
                            <input type='button' value='x' class='removepicture' id='btn3' img-urla='<?php echo$imageURL ?>' itemid='<?php echo $row["imageid"]; ?>' >
                            <?php
                        }?>
                <h1 style="font-size: 1.8em;">Price <span style="color: crimson;"><?php echo $row["price"];?>$</span></h1>

                <h1 style="font-size: 1.8em;" >Rating</h1>
                <div class="stars" data-stars="1">
                    <svg height="25" width="23" class="star rating" data-rating="1">
                        <polygon points="9.9, 1.1, 3.3, 21.78, 19.8, 8.58, 0, 8.58, 16.5, 21.78" style="fill-rule:nonzero;"/>
                    </svg>
                    <svg height="25" width="23" class="star rating" data-rating="2">
                        <polygon points="9.9, 1.1, 3.3, 21.78, 19.8, 8.58, 0, 8.58, 16.5, 21.78" style="fill-rule:nonzero;"/>
                    </svg>
                    <svg height="25" width="23" class="star rating" data-rating="3">
                        <polygon points="9.9, 1.1, 3.3, 21.78, 19.8, 8.58, 0, 8.58, 16.5, 21.78" style="fill-rule:nonzero;"/>
                    </svg>
                    <svg height="25" width="23" class="star rating" data-rating="4">
                        <polygon points="9.9, 1.1, 3.3, 21.78, 19.8, 8.58, 0, 8.58, 16.5, 21.78" style="fill-rule:nonzero;"/>
                    </svg>
                    <svg height="25" width="23" class="star rating" data-rating="5">
                        <polygon points="9.9, 1.1, 3.3, 21.78, 19.8, 8.58, 0, 8.58, 16.5, 21.78" style="fill-rule:nonzero;"/>
                    </svg>
                </div>
              <h1 style="font-size: 1.9em;">Comments</h1>
                <?php
                $query2 = $mysqli->query("SELECT COMMENT,firstname, lastname,comments.created_at FROM image INNER JOIN comments ON comments.imageid = image.imageid INNER JOIN user ON comments.userid = user.userid WHERE image.imageid ='" . $row["imageid"] . "'");
                $imgid=$row["imageid"];

                if($query2->num_rows > 0) {
                    while($row = $query2->fetch_assoc()){
                            $createdat=$row["created_at"];
                        echo "<p style='color: #0d95e8;line-height: 0px;'>".$row["firstname"]." ".$row["lastname"]."</p>";
                        echo "<p style='color: #888888;line-height: 10px;'>".$createdat."</p>";
                        echo "<p>".$row["COMMENT"]."</p>";
                        if($_SESSION['user']==$row["firstname"]){
                            ?>
                            <input type='button' value='x' class='remove' id='btn3' itemid='<?php echo $imgid ?>' created-at='<?php echo $createdat ?>' >
                            <?php
                        }
                        echo "<br>";
                    }
                }else{
                    echo "<p>No comments</p>";
                }
                ?>
                <script>
                    $('.remove').click(function() {
                        var is=this.getAttribute("itemid");
                        var ca=this.getAttribute("created-at");
                        $.ajax({
                            type: "POST",
                            url: "removecomment.php",
                            data: { id:is,creatd:ca }
                        }).done(function( msg ) {
                            alert(msg);
                            document.location.reload(true);

                        });
                    });
					 
                </script>
				<script>
   $('.removepicture').click(function() {
                        var is=this.getAttribute("itemid");
						var ca=this.getAttribute("img-urla");
                        $.ajax({
                            type: "POST",
                            url: "removepicture.php",
                            data: { id:is,url:ca}
                        }).done(function( msg ) {
                            alert(msg);
                            document.location.reload(true);

                        });
                    });
</script>

                <?php
                ?>
                <form action="commentsup.php" method="post">
                    <input type="hidden" name="var" value="<?php echo $imgid?>"/>
                <textarea rows="4" cols="30" name="comment" placeholder="Write a comment..."></textarea>
                    <input class="btn2" name="submit" type="submit" value="Comment"/>
                </form>
            </div>
        </a>

        <?php
    }

}
else
{
    echo '<h1 style="text-align: center;color: #888888;font-size: 3em;margin-top: 30vh;font-family: Mina, sans-serif;">No Search Results</h1>';
}

?>
<script type="text/javascript">
    $.fancyConfirm = function( opts ) {
        opts  = $.extend( true, {
            title     : 'Are you sure?',
            message   : '',
            okButton  : 'OK',
            noButton  : 'Cancel',
            callback  : $.noop
        }, opts || {} );

        $.fancybox.open({
            type : 'html',
            src  :
            '<div class="fc-content">' +
            '<h3>' + opts.title   + '</h3>' +
            '<p>'  + opts.message + '</p>' +
            '<p class="tright">' +
            '<a data-value="0" data-fancybox-close class="btn">' + opts.noButton + '</a>' +
            '<button data-value="1" data-fancybox-close class="btn">' + opts.okButton + '</button>' +
            '</p>' +
            '</div>',
            opts : {
                animationDuration : 350,
                animationEffect   : 'material',
                modal : true,
                baseTpl :
                '<div class="fancybox-container fc-container" role="dialog" tabindex="-1">' +
                '<div class="fancybox-bg"></div>' +
                '<div class="fancybox-inner">' +
                '<div class="fancybox-stage"></div>' +
                '</div>' +
                '</div>',
                afterClose : function( instance, current, e ) {
                    var button = e ? e.target || e.currentTarget : null;
                    var value  = button ? $(button).data('value') : 0;

                    opts.callback( value );
                }
            }
        });
    }
//


    // Template for custom "info" button
    $.fancybox.defaults.btnTpl.info = '<button data-fancybox-info class="fancybox-button fancybox-button--info" title="Info">&#x25cf;&#x25cf;&#x25cf;</button>';
    $.fancybox.defaults.btnTpl.addtocart = '<button data-fancybox-addtocart class="fancybox-button fancybox-button--addtocart" title="Add To Cart">' +
        '<svg enable-background="new 0 0 512 512" version="1.1" viewBox="0 0 400 400" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">'+
        '<path d="m509.87 89.6c-2.133-2.133-4.267-4.267-8.533-4.267h-405.33l-10.667-55.466c0-4.267-6.4-8.533-10.667-8.533h-64c-6.399-1e-3 -10.666 4.266-10.666 10.666s4.267 10.667 10.667 10.667h55.467l51.2 260.27c6.4 34.133 38.4 59.733 72.533 59.733h245.33c6.4 0 10.667-4.267 10.667-10.667s-4.267-10.667-10.667-10.667h-243.2c-17.067 0-34.133-8.533-42.667-23.467l311.47-42.666c4.267 0 8.533-4.267 8.533-8.533l42.667-170.67s0-4.267-2.133-6.4zm-59.734 166.4l-311.47 40.533-38.4-192h386.13l-36.267 151.47z"/>'+
        '<path d="m181.33 384c-29.866 0-53.333 23.467-53.333 53.333 0 29.867 23.467 53.333 53.333 53.333 29.867 0 53.333-23.467 53.333-53.333 1e-3 -29.866-23.466-53.333-53.333-53.333zm0 85.333c-17.067 0-32-14.934-32-32s14.933-32 32-32 32 14.934 32 32-14.933 32-32 32z"/>'+
        '<path d="m394.67 384c-29.867 0-53.333 23.467-53.333 53.333 0 29.867 23.467 53.333 53.333 53.333 29.867 0 53.333-23.467 53.333-53.333s-23.467-53.333-53.333-53.333zm0 85.333c-17.067 0-32-14.934-32-32s14.933-32 32-32 32 14.934 32 32-14.934 32-32 32z"/>'+
        '</svg>' +
        '</button>';
    $('body').on('click', '[data-fancybox-addtocart]', function() {
        var src = document.querySelectorAll("img.fancybox-image");
        var pat=src[0].attributes[1].nodeValue;
         var imagid=pat.replace(/^.*[\\\/]/, '');
        // var imagid=format.split("/").slice(-1).join().split(".").shift();
        $.ajax({
            type: "POST",
            url: 'cart.php',
            data: ({product:imagid}),
            success: function(data) {
                $.fancyConfirm({
                    title     : "Picture added to your cart",
                    message   : "if you want to do the payment click (Lets'Check out) it will redirect to the checkout page, Click (Let's keep looking) to add more awesome pictures. ",
                    okButton  : "Let's Check out",
                    noButton  : "Let's keep looking",
                    callback  : function (value) {
                        if (value) {
                            window.location = "viewcart.php";

                        } else {
                        }
                    }
                });

            }
        });


    });
    $('[data-fancybox="images"]').fancybox({

        // Disable idle
        idleTime : 0,
        arrows:false,
        keyboard: false,
        protect: true,
        // Display only these two buttons
        buttons : [
            'addtocart','info', 'close'
        ],

        // Custom caption
        caption : function( instance, obj ) {
            return '<p class="fancy-nav"  ></p>' + $(this).find('.caption').html();
        },

        onInit: function(instance) {

            // Toggle caption on tap
            instance.$refs.container.on('touchstart', '[data-fancybox-info]', function(e) {
                e.stopPropagation();
                e.preventDefault();

                instance.$refs.container.toggleClass('fancybox-vertical-caption');
            });

            // Display caption on button hover
            instance.$refs.container.on('mouseenter', '[data-fancybox-info]', function(e) {
                instance.$refs.container.addClass('fancybox-vertical-caption');

                // Hide caption when mouse leaves caption area
                instance.$refs.caption.parent().one('mouseleave', function(e) {
                    instance.$refs.container.removeClass('fancybox-vertical-caption');
                });

            });

        }

    });
</script>
<style>
    .btn {
        background: #FF6666;
        border-width: 0;
        color: #fff;
        text-decoration: none;
        padding: 7px 20px;
        line-height: 1.5;
        border-radius: 20px;
        text-transform: uppercase;
        font-family: 'Montserrat', 'Helvetica Neue', Helvetica, Arial, sans-serif;
        font-size: 80%;
        font-weight: 700;
        margin: 5px 5px 5px 0;
        display: inline-block;
        cursor: pointer;
        outline: none;
        transition: all .2s ease-in-out;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    .btn2 {
        background: #0d95e8;
        border-width: 0;
        color: #fff;
        text-decoration: none;
        padding: 7px 20px;
        line-height: 1.5;
        border-radius: 20px;
        text-transform: uppercase;
        font-family: 'Montserrat', 'Helvetica Neue', Helvetica, Arial, sans-serif;
        font-size: 80%;
        font-weight: 700;
        margin: 5px 5px 5px 0;
        display: inline-block;
        cursor: pointer;
        outline: none;
        transition: all .2s ease-in-out;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    #btn3 {
        background: #FF6666;
        float: right;
        border-width: 0;
        color: #fff;
        text-decoration: none;
        line-height: 1.5;
        border-radius: 50%;
        text-transform: uppercase;
        font-family: 'Montserrat', 'Helvetica Neue', Helvetica, Arial, sans-serif;
        font-size: 80%;
        font-weight: 700;
        margin: 5px 5px 5px 5px;
        display: inline-block;
        cursor: pointer;
        outline: none;
        transition: all .2s ease-in-out;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    .btn:hover, .btn:focus {
        color: #fff;
    }

    .fc-container .fancybox-bg {
        background: #eee;
    }

    .fancybox-is-open.fc-container .fancybox-bg {
        opacity: 0.95;
    }

    .fc-content {
        margin: 20px;
        max-width: 550px;
        padding: 50px;
        box-shadow: 10px 10px 60px -25px;
        border-radius: 4px;
    }

    .fc-content h3 {
        margin-top: 0;
        font-size: 1.6em;
        letter-spacing: normal;
    }

    .fc-content p {
        color: #666;
        line-height: 1.5;
    }

    .fc-content p:last-child {
        margin-bottom: 0;
    }

    /* Custom animation */
    .fancybox-fx-material.fancybox-slide--previous,
    .fancybox-fx-material.fancybox-slide--next {
        transform: translateY(-60px) scale(1.1);
        opacity: 0;
    }

    .fancybox-fx-material.fancybox-slide--current {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
</style>
