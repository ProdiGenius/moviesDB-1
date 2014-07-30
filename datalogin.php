<?php

//!!!-LOCAL DEVELOPMENT-!!!
/*$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "movies";*/

//!!!-STAGING ENVIRONMENT-!!!
$url=parse_url(getenv("CLEARDB_DATABASE_URL"));

$dbhost = $url["localhost"];
$dbuser = $url["bde3ebf2d90852"];
$dbpass = $url["b3386aac"];
$dbname = substr($url["heroku_87de99dde5d61b1"], 1);

mysql_select_db($dbname);

//!!!-PRODUCTION ENVIRONMENT-!!!
/*$dbhost = "localhost";
$dbuser = "yossil01";
$dbpass = "iopghj01";
$dbname = "yossil01_movies";*/

$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die("unable to connect to database.");
mysql_select_db($dbname) or die ("Unable to select");
?>