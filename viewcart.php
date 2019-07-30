
<?php
/**
 * Created by PhpStorm.
 * User: nuwan
 * Date: 30/05/2018
 * Time: 00:56
 */
session_start();
include('dbConfig.php');
$countries = array("AF" => "Afghanistan",
    "AX" => "Åland Islands",
    "AL" => "Albania",
    "DZ" => "Algeria",
    "AS" => "American Samoa",
    "AD" => "Andorra",
    "AO" => "Angola",
    "AI" => "Anguilla",
    "AQ" => "Antarctica",
    "AG" => "Antigua and Barbuda",
    "AR" => "Argentina",
    "AM" => "Armenia",
    "AW" => "Aruba",
    "AU" => "Australia",
    "AT" => "Austria",
    "AZ" => "Azerbaijan",
    "BS" => "Bahamas",
    "BH" => "Bahrain",
    "BD" => "Bangladesh",
    "BB" => "Barbados",
    "BY" => "Belarus",
    "BE" => "Belgium",
    "BZ" => "Belize",
    "BJ" => "Benin",
    "BM" => "Bermuda",
    "BT" => "Bhutan",
    "BO" => "Bolivia",
    "BA" => "Bosnia and Herzegovina",
    "BW" => "Botswana",
    "BV" => "Bouvet Island",
    "BR" => "Brazil",
    "IO" => "British Indian Ocean Territory",
    "BN" => "Brunei Darussalam",
    "BG" => "Bulgaria",
    "BF" => "Burkina Faso",
    "BI" => "Burundi",
    "KH" => "Cambodia",
    "CM" => "Cameroon",
    "CA" => "Canada",
    "CV" => "Cape Verde",
    "KY" => "Cayman Islands",
    "CF" => "Central African Republic",
    "TD" => "Chad",
    "CL" => "Chile",
    "CN" => "China",
    "CX" => "Christmas Island",
    "CC" => "Cocos (Keeling) Islands",
    "CO" => "Colombia",
    "KM" => "Comoros",
    "CG" => "Congo",
    "CD" => "Congo, The Democratic Republic of The",
    "CK" => "Cook Islands",
    "CR" => "Costa Rica",
    "CI" => "Cote D'ivoire",
    "HR" => "Croatia",
    "CU" => "Cuba",
    "CY" => "Cyprus",
    "CZ" => "Czech Republic",
    "DK" => "Denmark",
    "DJ" => "Djibouti",
    "DM" => "Dominica",
    "DO" => "Dominican Republic",
    "EC" => "Ecuador",
    "EG" => "Egypt",
    "SV" => "El Salvador",
    "GQ" => "Equatorial Guinea",
    "ER" => "Eritrea",
    "EE" => "Estonia",
    "ET" => "Ethiopia",
    "FK" => "Falkland Islands (Malvinas)",
    "FO" => "Faroe Islands",
    "FJ" => "Fiji",
    "FI" => "Finland",
    "FR" => "France",
    "GF" => "French Guiana",
    "PF" => "French Polynesia",
    "TF" => "French Southern Territories",
    "GA" => "Gabon",
    "GM" => "Gambia",
    "GE" => "Georgia",
    "DE" => "Germany",
    "GH" => "Ghana",
    "GI" => "Gibraltar",
    "GR" => "Greece",
    "GL" => "Greenland",
    "GD" => "Grenada",
    "GP" => "Guadeloupe",
    "GU" => "Guam",
    "GT" => "Guatemala",
    "GG" => "Guernsey",
    "GN" => "Guinea",
    "GW" => "Guinea-bissau",
    "GY" => "Guyana",
    "HT" => "Haiti",
    "HM" => "Heard Island and Mcdonald Islands",
    "VA" => "Holy See (Vatican City State)",
    "HN" => "Honduras",
    "HK" => "Hong Kong",
    "HU" => "Hungary",
    "IS" => "Iceland",
    "IN" => "India",
    "ID" => "Indonesia",
    "IR" => "Iran, Islamic Republic of",
    "IQ" => "Iraq",
    "IE" => "Ireland",
    "IM" => "Isle of Man",
    "IL" => "Israel",
    "IT" => "Italy",
    "JM" => "Jamaica",
    "JP" => "Japan",
    "JE" => "Jersey",
    "JO" => "Jordan",
    "KZ" => "Kazakhstan",
    "KE" => "Kenya",
    "KI" => "Kiribati",
    "KP" => "Korea, Democratic People's Republic of",
    "KR" => "Korea, Republic of",
    "KW" => "Kuwait",
    "KG" => "Kyrgyzstan",
    "LA" => "Lao People's Democratic Republic",
    "LV" => "Latvia",
    "LB" => "Lebanon",
    "LS" => "Lesotho",
    "LR" => "Liberia",
    "LY" => "Libyan Arab Jamahiriya",
    "LI" => "Liechtenstein",
    "LT" => "Lithuania",
    "LU" => "Luxembourg",
    "MO" => "Macao",
    "MK" => "Macedonia, The Former Yugoslav Republic of",
    "MG" => "Madagascar",
    "MW" => "Malawi",
    "MY" => "Malaysia",
    "MV" => "Maldives",
    "ML" => "Mali",
    "MT" => "Malta",
    "MH" => "Marshall Islands",
    "MQ" => "Martinique",
    "MR" => "Mauritania",
    "MU" => "Mauritius",
    "YT" => "Mayotte",
    "MX" => "Mexico",
    "FM" => "Micronesia, Federated States of",
    "MD" => "Moldova, Republic of",
    "MC" => "Monaco",
    "MN" => "Mongolia",
    "ME" => "Montenegro",
    "MS" => "Montserrat",
    "MA" => "Morocco",
    "MZ" => "Mozambique",
    "MM" => "Myanmar",
    "NA" => "Namibia",
    "NR" => "Nauru",
    "NP" => "Nepal",
    "NL" => "Netherlands",
    "AN" => "Netherlands Antilles",
    "NC" => "New Caledonia",
    "NZ" => "New Zealand",
    "NI" => "Nicaragua",
    "NE" => "Niger",
    "NG" => "Nigeria",
    "NU" => "Niue",
    "NF" => "Norfolk Island",
    "MP" => "Northern Mariana Islands",
    "NO" => "Norway",
    "OM" => "Oman",
    "PK" => "Pakistan",
    "PW" => "Palau",
    "PS" => "Palestinian Territory, Occupied",
    "PA" => "Panama",
    "PG" => "Papua New Guinea",
    "PY" => "Paraguay",
    "PE" => "Peru",
    "PH" => "Philippines",
    "PN" => "Pitcairn",
    "PL" => "Poland",
    "PT" => "Portugal",
    "PR" => "Puerto Rico",
    "QA" => "Qatar",
    "RE" => "Reunion",
    "RO" => "Romania",
    "RU" => "Russian Federation",
    "RW" => "Rwanda",
    "SH" => "Saint Helena",
    "KN" => "Saint Kitts and Nevis",
    "LC" => "Saint Lucia",
    "PM" => "Saint Pierre and Miquelon",
    "VC" => "Saint Vincent and The Grenadines",
    "WS" => "Samoa",
    "SM" => "San Marino",
    "ST" => "Sao Tome and Principe",
    "SA" => "Saudi Arabia",
    "SN" => "Senegal",
    "RS" => "Serbia",
    "SC" => "Seychelles",
    "SL" => "Sierra Leone",
    "SG" => "Singapore",
    "SK" => "Slovakia",
    "SI" => "Slovenia",
    "SB" => "Solomon Islands",
    "SO" => "Somalia",
    "ZA" => "South Africa",
    "GS" => "South Georgia and The South Sandwich Islands",
    "ES" => "Spain",
    "LK" => "Sri Lanka",
    "SD" => "Sudan",
    "SR" => "Suriname",
    "SJ" => "Svalbard and Jan Mayen",
    "SZ" => "Swaziland",
    "SE" => "Sweden",
    "CH" => "Switzerland",
    "SY" => "Syrian Arab Republic",
    "TW" => "Taiwan, Province of China",
    "TJ" => "Tajikistan",
    "TZ" => "Tanzania, United Republic of",
    "TH" => "Thailand",
    "TL" => "Timor-leste",
    "TG" => "Togo",
    "TK" => "Tokelau",
    "TO" => "Tonga",
    "TT" => "Trinidad and Tobago",
    "TN" => "Tunisia",
    "TR" => "Turkey",
    "TM" => "Turkmenistan",
    "TC" => "Turks and Caicos Islands",
    "TV" => "Tuvalu",
    "UG" => "Uganda",
    "UA" => "Ukraine",
    "AE" => "United Arab Emirates",
    "GB" => "United Kingdom",
    "US" => "United States",
    "UM" => "United States Minor Outlying Islands",
    "UY" => "Uruguay",
    "UZ" => "Uzbekistan",
    "VU" => "Vanuatu",
    "VE" => "Venezuela",
    "VN" => "Viet Nam",
    "VG" => "Virgin Islands, British",
    "VI" => "Virgin Islands, U.S.",
    "WF" => "Wallis and Futuna",
    "EH" => "Western Sahara",
    "YE" => "Yemen",
    "ZM" => "Zambia",
    "ZW" => "Zimbabwe");
	?><a href="<?php if($_SESSION['usertype']=="ADMIN"){echo'admindash.php';}else{echo'userdash.php';} ?>" style="margin-left:50px;">
<img src="img/d.png"width="100" height="100" border="0"style="margin-top:50px;">
</a><?php
if(!empty($_SESSION['cart'])){
	
    $total=0;
    echo "<div style='float: right;margin-right: 10vw;margin-top: 2vh;border: black solid 1px;padding: 10px 10px;'>";
    echo "<h1 id='ords' style='text-align:left;margin-left:50px;'>Order Summary</h1>";
    echo "<div>";
    echo "<table>";
    echo "<tr><th>Name</th><th>Category</th><th>Price</th></tr>";
    foreach($_SESSION['cart'] as $key=>$value)
    {
        $query = $mysqli->query("SELECT `title`,`image` ,`category`, `price` FROM `image` WHERE image='$value'");
        if($query->num_rows > 0)
    {
        while($row = $query->fetch_assoc())


    {
        $total+=$row["price"];
        $total2=number_format((float)$total, 2, '.', '');
       ?>
                    <tr><td id="tdor"><?php echo $row["title"]?></td><td id='tdor'><?php echo $row["category"]?></td><td id="tdor"><?php echo $row["price"]?>$</td><td><input type="button"value="remove" itemid="<?php echo $row["image"] ?>" class="remove"></td></tr>

        <?php
    }
	echo'<input type="submit" value="Pay" name="submit" style="position:relative;float:right">';
    }

    }
    echo"<tr><td id='tdor'>Total</td><td id='tdor'></td><td id='tdor'>$total2$</td></tr>";
    echo"</table>";
    echo"</div>";
    echo"</div>";


}else{
    echo '<img style="  display: block;
    margin-left: auto;
    margin-right: auto;margin-top: 2vh;" src="img/cart_empty.png"/>';
}
if(!empty($_SESSION['cart'])) {
    $usrname = $_SESSION['user'];
    $query1 = $mysqli->query("SELECT `firstname`, `lastname`, `postalcode`, `address`, `country`, `email`, `contactnumber` FROM `user` WHERE firstname='$usrname'");
    if ($query1->num_rows > 0) {
        while ($row2 = $query1->fetch_assoc()) {
            $firstname = $row2['firstname'];
            $lastname = $row2['lastname'];
            $postalcode = $row2['postalcode'];
            $address = $row2['address'];
            $country = $row2['country'];
            $email = $row2['email'];
            $contactnumber = $row2['contactnumber'];
            $cry = array_search($country, $countries);
            ?>
            <div style="margin-top: -20vh;margin-left: 15vw;border: black solid 1px;padding: 10px 10px;width: 35vw;">
                <h1 id='ords'>Billing Summary</h1>
                <table>
                    <tr>
                        <th class="left">First name</th>
                        <th class="left">Last name</th>
                    </tr>
                    <td><input type="text" value="<?php echo $firstname; ?>" name="firstname"
                               style="margin-right: 50px;" required></td>
                    <td><input type="text" value="<?php echo $lastname; ?>" name="lastname" required></td>
                    <tr>
                        <th class="left">Address</th>
                    </tr>
                    <tr>
                        <td></td>
                        </td>
                        <td><textarea rows="4" cols="20" name="address" required><?php echo $address; ?></textarea></td>
                    </tr>
                    <tr>
                        <th>Postal</th>
                        <td><input type="text" name="postal" size="5" value="<?php echo $postalcode; ?>" required></td>
                    </tr>
                    <tr>
                        <th>Country</th>
                        <td><select name="countries" id="cy" style="max-width:50%;">
                                <?php
                                foreach ($countries as $key => $value) {
                                    ?>
                                    <option value="<?= $key ?>"
                                            title="<?= htmlspecialchars($value) ?>"><?= htmlspecialchars($value) ?></option>
                                    <?php
                                }

                                ?>
                            </select>
                            <script>
                                document.getElementById('cy').value = '<?php echo $cry;?>';
                            </script>
                        </td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <th class="left">Contact Number</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="number" name="contactnum" value="<?php echo $contactnumber; ?>" required></td>
                    </tr>
                    <tr>
                        <th class="left">Email</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="email" name="email" value="<?php echo $email; ?>" required size="20"></td>
                    </tr>
                    <br>
                   
            </div>
            </table>
            </div>
			<div style="margin-top: 2vh;margin-left: 15vw;border: black solid 1px;padding: 10px 10px;width: 35vw;">
			<h1 id='ords'>Payment Method</h1>
			<div>
			
			<input type="radio" name="paymethod" id="radio_1" value="creditcard">Credit card Payment<br>
			<input type="radio" name="paymethod" value="paypal">Paypal Express Checkout<br>
			<div id="contentl1"></div>
			
			</div>
			</div>
            <?php
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
        #tdor{background-color: aliceblue;width:auto;font-size: 1.7em;}
        #ords{
            text-align: center;
            font-size: 1.5em;
        }
        .left{
            text-align: left;
        }
		.remove {
		-moz-box-shadow: 0px 10px 14px -7px #ffffff;
	-webkit-box-shadow: 0px 10px 14px -7px #ffffff;
	box-shadow: 0px 10px 14px -7px #ffffff;
	background-color:#f56262;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
	border:1px solid #ff0000;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:13px;
	font-weight:bold;
	padding:6px 6px;
	text-decoration:none;
	text-shadow:0px 1px 0px #c23c3c;
}
   input[type=submit] {
            background-color: gainsboro;
            border: none;
            color: black;
            padding: 16px 32px;
            text-decoration: none;
            margin: 2px 2px;
            margin-top: -50px;
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
            margin: 2px 2px;
            margin-top: -50px;
            cursor: pointer;
        }

    </style>

</head>
<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- Add your site or application content here -->

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
<script>
    $('.remove').click(function() {
        var is=this.getAttribute("itemid");
        $.ajax({
            type: "POST",
            url: "remove.php",
            data: { id:is }
        }).done(function( msg ) {
            alert( "Item removed " + msg );
            document.location.reload(true);
        });

    });
</script>
<script>
			$(document).ready(function() {
			$('input[type=radio][name=paymethod]').change(function() {
			if (this.value == 'creditcard') {
            $("<p>", { text: "Credit card details",class:"visa" }).appendTo("#contentl1");
			$("<strong>", { text: "Credit card Number: ",class:"visa" }).appendTo("#contentl1");
			$("<input>", {class:"visa" }).appendTo("#contentl1");
			$("<br>", {class:"visa" }).appendTo("#contentl1");
			$("<strong>", { text: "Expiration Date:",class:"visa"}).appendTo("#contentl1");
			$("<input>", { type:"date",class:"visa",style:"margin-left:35px;"  }).appendTo("#contentl1");
			$("<br>", {class:"visa" }).appendTo("#contentl1");
			$("<strong>", { text: "CVV:",class:"visa"}).appendTo("#contentl1");
			$("<input>", { type:"input",class:"visa",style:"margin-left:112px;",size:"4"  }).appendTo("#contentl1");
			}
			else if (this.value == 'paypal') {
            $(".visa").remove();
			}
			});
			});
			</script>
