<?php

//!!!-LOCAL DEVELOPMENT-!!!
/*$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "movies";*/

//!!!-STAGING ENVIRONMENT-!!!
//$url=parse_url(getenv("mysql://bd2198a363403a:e72fa6de@us-cdbr-iron-east-01.cleardb.net/heroku_d78f3829bda1f61?reconnect=true"));

$dbhost = "us-cdbr-iron-east-01.cleardb.net";
$dbuser = "bd2198a363403a";
$dbpass = "e72fa6de";
$dbname = "heroku_d78f3829bda1f61";

//!!!-PRODUCTION ENVIRONMENT-!!!
/*$dbhost = "localhost";
$dbuser = "yossil01";
$dbpass = "iopghj01";
$dbname = "yossil01_movies";*/

ini_set('user_agent', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.9) Gecko/20071025 Firefox/2.0.0.9');

$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die("unable to connect to database.");
mysqli_select_db($conn, $dbname) or die ("Unable to select");
?>