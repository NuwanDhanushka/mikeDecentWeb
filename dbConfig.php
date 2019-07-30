<?php
//DB details
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'mikedecenttweb';

//Create connection and select DB
$mysqli  = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($mysqli ->connect_error) {
    die("Unable to connect database: " . $db->connect_error);
}