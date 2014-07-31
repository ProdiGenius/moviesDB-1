<html>

<head>
    <meta name="title" content=""/>
    <meta name="description" content=""/>
    <title></title>
    <meta name="og:site_name" content="WatchItFree"/>
    <meta name="og:title" content=""/>
    <meta name="og:description" content=""/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <script src="jquery-ui-1.8.13.custom.min.js"></script>
    <link rel='stylesheet' type='text/css' href='css/style.css'/>
    <link rel='stylesheet' type='text/css' href='css/movie_styles.css'/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>

</head>

<body>

<div id="header">
    <div id="Home"><a href="http://www.watchitfree.me" style="text-decoration:none;">HOME</a></div>
</div>
<div id="page-content">
    <div id = "container">

        <!--<div id="disclaimer"><h3>Welcome to the WatchItFree Alpha stage!</h3>
        </div>-->

        <?php

        include 'datalogin.php';

        $name = $_GET["id"];

        $name = urlencode($name);

        if (false !== ($json = file_get_contents("http://www.omdbapi.com/?t=$name"))) {
            $details = json_decode($json);

            if ($details->Response == 'True') {
                echo('

                <div id="thumbnail-box">

                <a href="" title="' . $details->Title . ' (2014)">
			    <img src=' . $details->Poster . '/></a>

			    </div>

                <div id="movie_description">

                    <h4>' . $details->Title . '<span style="opacity: 0.8">' . " " . $details->Year . '</span></h4>

                    <p>GENRE: '.$details->Genre.'</p>

                    <br>

                    <p>' . $details->Plot . '</p>
                    <p>Directed by: '.$details->Director.'</p>
                    <p>Actors: '.$details->Actors.'</p>
                    <br>

                    <p class="rated"> RATED: '.$details->Rated.'</p>
                    <p>RUNTIME: '.$details->Runtime.'</p>
                    <p>'.$details->imdbRating.'/10</p>
                    <p>'.$details->Awards.'</p>

                </div>

                <table cellspacing="0"> <!-- cellspacing="0" is important, must stay -->

                    <!-- Table Header -->
                    <thead>
                    <tr>
                        <th>Link</th>
                        <th>Quality</th>
                        <th>Submitted</th>
                    </tr>
                    </thead>
                    <!-- Table Header -->

                    <!-- Table Body -->
                    <tbody>');

                $sql = "SELECT link, created FROM `$name`";

                $retval = mysqli_query($conn, $sql);

                if (!$retval) {
                    die ("could not get data.");
                }

                function addhttp($url)
                {
                    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
                        $url = "http://" . $url;
                    }
                    return $url;
                }

                while ($row = mysqli_fetch_array($retval, MYSQL_ASSOC)) {
                    echo('
                    <tr>
                        <td><a href=' . addhttp($row["link"]) . '>' . $row["link"] . '</a> </td>
                        <td>DVD</td>
                        <td>' . $row["created"] . '</td>

                    </tr>');

                }

                echo('

                    </tbody>
                    <!-- Table Body -->

                </table>

                </div>
                ');
            }


        } else {
            echo "Movie does not exist.";
        }

        ?>

        </div>

        <div id="footer">
            <div class="wrapper">
                <div class="bottomMenu container firstone">
                    <h4>Site Links</h4>
                    <ul>
                        <li><a href="/keywords.html">Keywords</a></li>
                        <li><a href="/genres.html">Movie Genres</a></li>
                        <li><a href="/years.html">Movie Years</a></li>
                        <li><a href="/tv/genres.html">TV Show Genres</a></li>
                        <li><a href="/tv/years.html">TV Show Years</a></li>
                        <li><a href="/trends/">Trends</a></li>
                        <li><a href="/latest-watched-movies.html">Latest Watched</a></li>
                        <li><a href="/terms.html">Terms of Service</a></li>
                        <li><a href="/rules.html">Rules</a></li>
                        <li><a href="/privacy-policy.html">Privacy Policy</a></li>
                        <li><a href="/contacts.html">Contacts</a></li>
                    </ul>
                </div>
            </div>
            <p>
                WatchItFree provides links to other sites on the internet and doesn't host any files itself.
            </p>
        </div>
        <body>
        <script language="javascript" type="text/javascript" src="js/link_target.js"></script>
</html>