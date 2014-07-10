<html>
<head>
<title>Add a New Movie</title>
<head/>

<body>
<?php

if (isset($_POST['add']))
{
	$username = 'root';
	$password = '';

	$db = 'movies';

	$conn = mysql_connect('localhost', $username, $password);

    // Sanitize input
	function sanitize($in) {
 		return addslashes(htmlspecialchars(strip_tags(trim($in))));
	}

	$sanitzedName =  mysql_real_escape_string('name');

   	$name = sanitize($_POST['name']);
   	$name = mysql_real_escape_string($name);
   	$released = sanitize($_POST['released']);
    $runtime = $_POST['runtime'];
    $actors = $_POST['actors'];
    $link = $_POST['link'];
    
    $sql = "SHOW TABLES LIKE '$name'";
    
    mysql_select_db('movies');
    $retval = mysql_query($sql, $conn);
    
    if (mysql_num_rows($retval))   {
        
        echo "table already existed";
  	
  		$sql = "INSERT INTO $name (Name, Released, Runtime, Actors, created) VALUES ('$name','$released', '$runtime', '$actors', NOW())";
			
		mysql_select_db('movies');
	
		$retval = mysql_query($sql, $conn);
	
		if (!$retval)
		{
			die ('Could not enter data: ' . mysql_error());
		}
		echo "enetered data successfully\n";
  	
    	mysql_close($conn);
    } else {
		
		$sql = "CREATE TABLE `$name`
				(id INT NOT NULL AUTO_INCREMENT, 
				PRIMARY KEY (id), 
				name VARCHAR(250), 
				released VARCHAR(250), 
				runtime VARCHAR (50), 
				actors VARCHAR (500), 
				created DATETIME);
				
				/*CREATE TABLE $name.links 
				($name.linkId INT NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (id),
				link VARCHAR (500) NOT NULL			
				);
				
				CREATE TABLE $name.andlinks
				($name.Id INT NOT NULL,
				$name.linkId INT NOT NULL,
				CONSTRAINT ML_.$name.MovieLink PRIMARY KEY (
					$name.Id,
					$name.linkId
				),
				FOREIGN KEY ($name.Id) REFERENCES $name ($name.Id),
				FOREIGN KEY ($name.LinkId) REFERENCES $name.links ($name.linkId)
				);
				
				INSERT INTO $name (Name, Released, Runtime, Actors, created) 
				VALUES ('$name','$released', '$runtime', '$actors', NOW());				
				
				
				INSERT INTO $name.links (link) 
				VALUES ($link)*/
				";
    
    	mysql_query($sql, $conn) or die (mysql_error());
    	
		echo "new table created.";  
		
		mysql_close($conn);
	}
} else {

?>

<form method ="post" action = "<?php $_PHP_SELF?>">
<table width="400" border = "0" cellspacing = "1" cellpadding = "2">

<tr>
<td width = "100">Movie Name</td>
<td><input name = "name" type = "text" id = "name"></td>
</tr>

<tr>
<td width = "100">Release Date</td>
<td><input name = "released" type = "text" id = "released"></td>
</tr>

<tr>
<td width = "100">Runtime</td>
<td><input name = "runtime" type = "text" id = "runtime"></td>
</tr>

<tr>
<td width = "100">Actors</td>
<td><input name = "actors" type = "text" id = "actors"></td>
</tr>

<tr>
<td width = "100">Link</td>
<td><input name = "link" type = "text" id = "link"></td>
</tr>

<td width="100"> </td>
<td> </td>
</tr>
<tr>
<td width="100"> </td>
<td>
<input name="add" type="submit" id="add" value="Add Movie">
</td>
</tr>

</table>
</form>

<?php
}
?>

</body>
</html>