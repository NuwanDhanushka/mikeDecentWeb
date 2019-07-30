<?php
/**
 * Created by PhpStorm.
 * User: nuwan
 * Date: 28/05/2018
 * Time: 00:19
 */
include ('dbConfig.php');
if(isset($_POST['submit']))
{
    $firstname = mysqli_real_escape_string($mysqli,$_POST['firstname']); // get values from form
    $lastname= mysqli_real_escape_string($mysqli,$_POST['lastname']);
    $gender=$_POST['gender'];
    $postal=$_POST['postal'];
    $address=$_POST['address'];
    $countries=$_POST['countries'];
    $email=$_POST['email'];
    $contactnum=$_POST['contactnum'];
    $password=$_POST['password'];
    $bday=$_POST['bday'];
    $usertype="USER"; //insert values to database
    $sql = "INSERT INTO `user` (`userid`, `firstname`, `lastname`, `gender`, `postalcode`, `address`, `country`, `email`, `contactnumber`, `password`, `dob`, `usertype`) VALUES (NULL, '$firstname', '$lastname', '$gender', '$postal', '$address', '$countries', '$email', '$contactnum', '$password', '$bday', '$usertype')";
    if (!mysqli_query($mysqli,$sql)) {
        die("An error" . mysqli_error($mysqli));
    } else {
        echo '<script type="text/javascript">alert("User Created")</script>';
    }
}
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
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/clear.css">

    <style>
        @import url('https://fonts.googleapis.com/css?family=Mina');
        body{
            font-family: 'Mina', sans-serif;
        }
        .left{
            text-align:left;
        }
        th{

            font-weight: normal;
        }
        table{
            margin-left: 50vw;
            margin-top: 6vh;
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
        input,textarea,select{
            background-color:rgba(0, 0, 0, 0);
            outline:none;
            border:1px solid black;
        }
    </style>
</head>
<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- Add your site or application content here -->
<body id="page" style=" overflow: hidden;">
<div style="z-index:;">
<ul class="cb-slideshow">
    <li><span>Image 01</span></li>
    <li><span>Image 02</span></li>
    <li><span>Image 03</span></li>
    <li><span>Image 04</span></li>
    <li><span>Image 05</span></li>
    <li><span>Image 06</span></li>
</ul>
</div>
<div style="z-index: 99999;">
    <form action="signup.php" method="post">
    <div style="position: absolute;margin-top:35vh;margin-left:20vw;z-index:99999;font-size: 2.1em;">
        <a href="login.php"style="text-decoration: none;color: black;" ><h1>Go<br>Back</h1></a>
    </div>
    <div style="font-size: 1.2em;position: absolute;background-color:rgba(255,255,255,0.8);width: 100%;height: 88%;margin-top: 6vh;">
    <table style="margin-top: 5px;">
        <tr>
            <th class="left">First name</th>
            <th class="left">Last name</th></tr>
        <td><input type="text" name="firstname" style="margin-right: 50px;" required></td>
        <td><input type="text" name="lastname" required></td>
        <tr>
            <th class="left">Gender</th>
        </tr>
        <tr>
            <td><input type="radio" name="gender" value="Male" checked> Male<br>
                <input type="radio" name="gender" value="Female"> Female<br></td>
        </tr>
        <tr><th class="left">Address</th></tr>
        <tr><td></td></td><td><textarea rows="4" cols="20" name="address" required></textarea></td></tr>
        <tr><th>Postal</th><td><input type="text" name="postal" size="5" required></td></tr>
        <tr><th>Country</th><td><select name="countries" style="max-width:50%;" >
                    <?php
                    foreach($countries as $key => $value) {
                        ?>
                        <option value="<?= $key ?>" title="<?= htmlspecialchars($value) ?>"><?= htmlspecialchars($value) ?></option>
                        <?php
                    }
                    ?>
                </select></td></tr>
        <tr></tr>
        <tr><th class="left">Contact Number</th></tr>
        <tr><td><input type="number" name="contactnum" required></td></tr>
        <tr><th class="left">Email</th></tr>
        <tr><td><input type="email" name="email" required></td></tr>
        <tr><th class="left">Birthday</th></tr>
        <tr><td><input type="date" name="bday"  required></td><td style="margin-right: 50vw;" align="center"><input type="submit" value="Sign Up" name="submit"></td></tr>
        <tr><th class="left">Password</th></tr>
        <tr><td><input type="password" name="password" required></td></tr><br>
       <!-- <tr><th class="left">Confirm Password</th></tr>
        <tr><td><input type="password" name="cpassword" required></td></tr>-->
    </div>
    </table>
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

