<html>

<head>
    <meta name="title" content=""/>
    <meta name="description" content=""/>
    <title></title>
    <meta name="og:site_name" content="WatchItFree"/>
    <meta name="og:title" content=""/>
    <meta name="og:description" content=""/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <script src="js/jquery-1.11.1.min.js"></script>
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

        ini_set('user_agent', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.9) Gecko/20071025 Firefox/2.0.0.9');

        $name = urlencode($name);

        function curl($url) {
            // Assigning cURL options to an array
            $options = Array(
                CURLOPT_RETURNTRANSFER => TRUE,  // Setting cURL's option to return the webpage data
                CURLOPT_FOLLOWLOCATION => TRUE,  // Setting cURL to follow 'location' HTTP headers
                CURLOPT_AUTOREFERER => TRUE, // Automatically set the referer where following 'location' HTTP headers
                CURLOPT_CONNECTTIMEOUT => 120,   // Setting the amount of time (in seconds) before the request times out
                CURLOPT_TIMEOUT => 120,  // Setting the maximum amount of time for cURL to execute queries
                CURLOPT_MAXREDIRS => 10, // Setting the maximum number of redirections to follow
                CURLOPT_USERAGENT => "Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.1a2pre) Gecko/2008073000 Shredder/3.0a2pre ThunderBrowse/3.2.1.8",  // Setting the useragent
                CURLOPT_URL => $url, // Setting cURL's URL option with the $url variable passed into the function
            );

            $ch = curl_init();  // Initialising cURL
            curl_setopt_array($ch, $options);   // Setting cURL's options using the previously assigned array data in $options
            $data = curl_exec($ch); // Executing the cURL request and assigning the returned data to the $data variable
            curl_close($ch);    // Closing cURL
            return $data;   // Returning the data from the function
        }

        ini_set('max_execution_time', 600);

        if (false !== ($json = file_get_contents("http://www.omdbapi.com/?t=$name"))) {
            $details = json_decode($json);

            if ($details->Response == 'True') {

                $homepage = file_get_contents("http://www.imdbapi.com/?t=$name");
                $arr = json_decode($homepage, true);

                $results = curl("http://www.imdbapi.com/?t=$name");

                echo $results;

                echo('

                <div id="thumbnail-box">

                <a href="" title="' . $details->Title . ' (2014)">
			    <img src=' . $arr["Poster"] . '/></a>

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