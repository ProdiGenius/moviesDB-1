<html>


<head>
    <link rel='stylesheet' type='text/css' href='css/style.css'/>
    <link rel="stylesheet" type="text/css" href="css/search.css" media="screen"/>
    <script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script src="js/jquery-1.11.1.min.js"></script>

    <script type="text/javascript">

    </script>

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
<div id="page-content">

    <div id ="pagination_wrapper">

        <?php

        include("datalogin.php");


        if (!isset ($_GET["sort"]))
        {
            die ("404. Sorry.");
        } else {
            $sort_url = $_GET["sort"];
        }

        $max_results = 10;

        if (!isset ($_GET["page"]))
        {
            $page = 0;
        } else {
            $page = $_GET["page"];
        }

        if ($sort_url == 'alpha')
        {
            $sort = "table_name";
            echo('<div id="pagination-title"><h1>Movies (A-Z)</h1></div>');
        } else if ($sort_url == 'date') {
            $sort = "create_time desc";
            echo('<div id="pagination-title"><h1>New Movies (Date Added)</h1></div>');

        } else {
            $sort = "create_time desc";
            echo('<div id="pagination-title"><h1>New Movies (Date Added)</h1></div>');
        }

        $sql_total_movies = "select count(*) as total from information_schema.tables where table_schema = 'heroku_d78f3829bda1f61'";

        $return = mysqli_query($conn, $sql_total_movies);

        if (!$return)
        {
            die ("Could not get data.");
        }

        $row = mysqli_fetch_array($return);
        $rec_count = $row[0];


        if ($page == 0) {
            $offset = 0;
        }

        $number_pages = ($rec_count - ($rec_count % $max_results)) / $max_results;

        if ($rec_count % $max_results !== 0)
        {
            $number_pages += 1;
        }

        $offset = $max_results * $page;

        $sql = "select table_name from information_schema.tables where table_schema = 'heroku_d78f3829bda1f61' order by $sort LIMIT $offset, $max_results";

        $retval = mysqli_query($conn, $sql);

        if (!$retval) {
            die ("Could not get data for retval. '".$page."'");
        }

        echo ('<div id="thumbnail-list">');
        echo ('<ul>');
        while ($row = mysqli_fetch_array($retval))
        {
            echo ("<li><a href='movie.php?id=$row[0]'>");
            $json = file_get_contents("http://www.omdbapi.com/?t=$row[0]");
            $details = json_decode($json);

            if ($details -> Response == 'True')
            {
                $imdb = $details->imdbID;
            }

            echo ('<img src="http://img.omdbapi.com/?i='.$imdb.'&apikey=dcff2d3d">');
            $row[0] = ucwords($row[0]);
            echo ucwords(urldecode("<h3>$row[0]</h3>"));
            echo ('<p>'.$details->Plot.'</p>');
            echo ('</a></li>');
        }
        echo ('<ul>');
        echo ('</div>');


        echo ('<div class="pagination">');
        echo ('<a href="sort.php?page=0" class="page gradient">First</a>');
        for ($i = 0; $i < $number_pages; ++$i)
        {
            $link_address = 'sort.php?sort='.$sort_url.'&page='.$i;
            echo "<a href='".$link_address."' class='page gradient'>$i</a>";
        }
        $last_link = $number_pages - 1;
        echo ('<a href="sort.php?page='.$last_link.'" class="page gradient">Last</a>');
        echo ('</div>');

        mysqli_close($conn);

        ?>
    </div>

<div id="push"></div>
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

<script language="javascript" type="text/javascript" src="js/link_target.js"></script>
<script src="js/search.js"></script>
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-53458532-1', 'auto');
    ga('send', 'pageview');

</script>

<script language="javascript" type="text/javascript" src="js/pagination.js"></script>

</body>

</html>