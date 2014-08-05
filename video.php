<?php

include ("datalogin.php");

$name = $_GET["name"];

$link_id = $_GET["id"];

$name = urlencode($name);

//echo("Movie: " . $name . " id: " . $link_id);

$sql = "SELECT link FROM `$name` WHERE id='$$link_id'";

$response = mysqli_query($conn, $sql);

if (!$response)
{
    die ("Could not get data.");
}

$row = mysqli_fetch_array($response);

echo ("<p>{$row['link']}</p>");

?>