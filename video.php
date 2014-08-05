<html>

<head>
    <link rel='stylesheet' type ='text/css' href='css/style.css' />
    <link rel="stylesheet" type="text/css" href="css/search.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/video.css" media="screen" />
</head>

<body>

<div id="header">

    <div id="navContainer">

        <div id="Home"><a href="http://www.watchitfree.me" style="text-decoration:none;">HOME</a></div>

        <div id="Home"><a href="new_link.php" style="text-decoration:none;">LINKS</a></div>

        <div id="search">
            <div class="icon">
                <p>SEARCH:</p>
            </div>
            <input id="search" type="text" autocomplete="off">
            <ul id="results"></ul>
        </div>
    </div>

</div>


<div id="video_container">
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

    echo ('<h1><a href="'.$video_link.'">CLICK HERE TO PROCEED TO THE VIDEO</a></h1>');

    ?>
</div>
</body>
</html>