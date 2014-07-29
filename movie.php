<html>

<head>
<title></title>
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
			echo "IMDB-ID : ".$details->imdbID.'<br>';
			echo "Title : ".$details->Title.'<br>';
			echo "Year : ".$details->Year.'<br>';
			echo "Rated : ".$details->Rated.'<br>';
			echo "Poster Image Path: ".$details->Poster.'<br>';
			echo "<img src=\"$details->Poster\"><br>";
			echo "Released Date: ".$details->Released.'<br>';
			echo "Runtime : ".$details->Runtime.'<br>';
			echo "Genre : ".$details->Genre.'<br>';
			echo "Director : ".$details->Director.'<br>';
			echo "Writer : ".$details->Writer.'<br>';
			echo "Actors : ".$details->Actors.'<br>';
			echo "Plot : ".$details->Plot.'<br>';
			echo "Language : ".$details->Language.'<br>';
			echo "Country : ".$details->Country.'<br>';
			echo "Awards : ".$details->Awards.'<br>';
			echo "Metascore : ".$details->Metascore.'<br>';
			echo "IMDB Rating : ".$details->imdbRating.'<br>';
			echo "IMDB Votes : ".$details->imdbVotes.'<br>';

			$sql = "SELECT link FROM `$name`";
						
			$retval = mysql_query($sql, $conn);
			
			if (! $retval)
			{
				die ('could not get data.');
			}
			
			while ($row = mysql_fetch_array($retval, MYSQL_ASSOC))
			{
				echo "Link : {$row['link']} <br> ";
			}
			
			mysql_close($conn);
		}
	}
	else {
		echo "Movie does not exist.";
	}
	
	
?>

<body>

</html>