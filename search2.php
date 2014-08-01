<?php

include ("datalogin.php");
ini_set('display_errors', '1');

$search_output = "";
if(isset($_POST['searchquery']) && $_POST['searchquery'] != ""){
	$searchquery = preg_replace('#[^a-z 0-9?!]#i', '', $_POST['searchquery']);
	if($_POST['filter1'] == "Movies"){
		//$sql = "SELECT name, id FROM '$searchquery' ";	
		$sql = "SHOW TABLES FROM `movies`";
	} 
    $query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
	$count = mysqli_num_rows($query);
	if($count > 0){
		//$search_output .= "</hr>$count results for <strong>'$searchquery'</strong></hr>";

        //$row = mysqli_fetch_array($query);

        $number_results = 0;

        while($row = mysqli_fetch_array($query)){

            $table_name = $row[0];

            //$table_name = preg_replace('/[+]/', "", $table_name);

            $searchquery = str_replace(" ", "+", $searchquery);

            if ($searchquery == $table_name)
            {
                $searchquery = str_replace("+", " ", $searchquery);
                $search_output .= "<p>Found Your thing $searchquery</p>";
                $number_results++;
            }

            /*else {
                $search_output = "<p>No results were returned for: $table_name </p>";
            }*/

			/*$id = $row["id"];
			$title = $row["table_name"];
		    $search_output .= "Movie $id - $title </br> <li><a class='mainLink' href='movie.php?id=$title'> $title </a>";*/
        }
	} else {
		$search_output = "</hr>0 results for <strong>$searchquery</strong></hr>$sql";
	}
}
?>
<html>
<head>
</head>
<body>
<h2>Search</h2>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
Search For: 
  <input name="searchquery" type="text" size="44" maxlength="88"> 
Within: 
<select name="filter1">
<option value="Movies">Movies</option>
<option value="Tv-Shows">Tv-Shows</option>
</select>
<input name="Btn" type="submit">
</br>
</form>
<div>
<?php echo $search_output; ?>
</div>
</body>
</html>