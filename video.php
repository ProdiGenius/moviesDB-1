<?php

include ("datalogin.php");

$name = $_GET["name"];

$link_id = $_GET["id"];

$name = urlencode($name);

//echo("Movie: " . $name . " id: " . $link_id);

function addhttp($url)
{
    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
        $url = "http://" . $url;
    }
    return $url;
}

$sql = "SELECT link FROM `$name` WHERE id='$link_id'";

$response = mysqli_query($conn, $sql);

if (!$response)
{
    die ("Could not get data.");
}

$row = mysqli_fetch_assoc($response);

$video_link = $row["link"];
$video_link = addhttp($video_link);

echo ('

    <div id="video_container">

        <h1><a href="'.$video_link.'">CLICK HERE TO PROCEED TO THE VIDEO</a></h1>

    </div>

');

?>