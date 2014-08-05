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
<script src="js/search.js"></script>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-53458532-1', 'auto');
    ga('send', 'pageview');

</script>
</body>
</html>