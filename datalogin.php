<?php

//!!!-LOCAL DEVELOPMENT-!!!
/*$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "movies";*/

//!!!-STAGING ENVIRONMENT-!!!
$url=parse_url(getenv("mysql://bd2198a363403a:e72fa6de@us-cdbr-iron-east-01.cleardb.net/heroku_d78f3829bda1f61?reconnect=true
"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"],1);

$link = mysqli_connect($server, $username, $password, $db);

mysqli_select_db($link, $db);

//!!!-PRODUCTION ENVIRONMENT-!!!
/*$dbhost = "localhost";
$dbuser = "yossil01";
$dbpass = "iopghj01";
$dbname = "yossil01_movies";*/

ini_set('user_agent', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.9) Gecko/20071025 Firefox/2.0.0.9');

/*$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die("unable to connect to database.");
mysqli_select_db($conn, $dbname) or die ("Unable to select");*/
?>