<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "movies";
    $conn=mysql_connect($dbhost, $dbuser, $dbpass) or die("unable to connect to database.");
    mysql_select_db($dbname) or die ("Unable to select");
?>