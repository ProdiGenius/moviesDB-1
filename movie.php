<html>

<head>
<meta name="title" content=""/>
<meta name="description" content=""/>
<title></title>
<meta name="og:site_name" content="WatchItFree"/>
<meta name="og:title" content=""/>
<meta name="og:description" content=""/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script src="jquery-ui-1.8.13.custom.min.js"></script>
<link rel='stylesheet' type='text/css' href='Moviestyle2.css' />
</head>

<body>

<?php	
	include 'datalogin.php';
	
	$name = $_GET["id"];
	
	$name = urlencode($name);
	
	if (false !== ($json = file_get_contents("http://www.omdbapi.com/?t=$name")))
	{
	    $details = json_decode($json);
	
		if ($details -> Response == 'True')
		{
		echo '<div id="header">
			<div id="Home"><a href="http://www.watchitfree.me" style="text-decoration:none;">HOME</a></div>
			</div>
			<div id="page-content">
			<div class="movie-container">
			<div id="disclaimer"><h3>Welcome to the WatchItFree Alpha stage!</h3>
			</div>
			<div id="movie-description">';
		echo '<h4>' .$details->Title. '<span style="opacity: 0.8">'.$details->Year.'</span></h4>
			<br>';

		echo '<p>'.$details->Plot.'</p>
			</div>';
		
		echo '<div id="movie-ratings"></div>		
			<div id="thumbnail-box">
			<a href="" title="'.$details->Title.' (2014)">
			<img href="'.$details->Poster.'"/></a></div>
			</div>';

		echo '<div class="dataTableContainer">
			<table class="dataTable">
            <thead>
                <tr>
                    <th class="LinkCell"><div></div></th>
                    <th class="voteCell oddCell"><div>Voting</div></th>
                    <th class="qualCell"><div>Quality</div></th>
                    <th class="ageCell oddCell"><div>Age</div></th>
                </tr>
            </thead>
            <tbody>';
			$sql = "SELECT link FROM `$name`";

						
			$retval = mysql_query($sql, $conn);
			
			if (! $retval)
			{
				die ('could not get data.');
			}
			
			while ($row = mysql_fetch_array($retval, MYSQL_ASSOC))
			{
				echo '<tr id="link_ID">
					<td class="LinkCell">
                    <img style="height: 16px; width: 16px;" src="http://www.google.com/s2/favicons?domain=novamov.me"/>';
                echo "<a href=' {$row['link']} '>";
				echo 'novamov.me</a>
                    </td>';
					
                echo'<td class="voteCell oddCell qualCell">
                    <span class="text">Ratings Unavailable</span>
                    </td>
                    <td class="qualCell">CAM</td>
                    <td class="ageCell oddCell">now</td>
                </tr>';
			}
			echo"</tbody>
			</table>
			</div>
		</div>";	
			mysql_close($conn);
		}
	}
	else {
		echo "Movie does not exist.";
	}	
	
?>
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

</html>