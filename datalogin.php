<?php
    $dbhost = "localhost";
    $dbuser = "yossil01";
    $dbpass = "iopghj01";
    $dbname = "yossil01_movies";
    $conn=mysql_connect($dbhost, $dbuser, $dbpass) or die("unable to connect to database.");
    mysql_select_db($dbname) or die ("Unable to select");
?>