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

mysqli_connect($server, $username, $password, $db);

//mysqli_select_db($db);

//!!!-PRODUCTION ENVIRONMENT-!!!
/*$dbhost = "localhost";
$dbuser = "yossil01";
$dbpass = "iopghj01";
$dbname = "yossil01_movies";*/

/*$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die("unable to connect to database.");
mysql_select_db($dbname) or die ("Unable to select");*/
?>