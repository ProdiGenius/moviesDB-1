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
    
    $name = urlencode($name);
    
    $link = sanitize($_POST['link']);
    $link = mysql_real_escape_string($link);
    
    $json = file_get_contents("http://www.omdbapi.com/?t=$name");
    $details = json_decode($json);
    
    if ($details->Response=='True')
    {
		$sql = "SHOW TABLES LIKE '$name'";
	
		mysql_select_db('movies');
		$retval = mysql_query($sql, $conn);
	
		if (mysql_num_rows($retval))   {
		
			echo "table already existed";
	
			$sql = "INSERT INTO `$name` (link, created) VALUES ('$link', NOW())";
			
			mysql_select_db('movies');
	
			$retval = mysql_query($sql, $conn);
	
			if (!$retval)
			{
				die ('Could not enter data: ' . mysql_error());
			}
			echo "enetered data successfully\n";
	
			mysql_close($conn);
		} else {
		
			$sql_create = "CREATE TABLE `$name`
					(id INT NOT NULL AUTO_INCREMENT, 
					PRIMARY KEY (id), 
					link VARCHAR(500), 
					created DATETIME)
					";
				
			$sql_insert= "INSERT INTO `$name`
							(link, created)
							VALUES ('$link', NOW())";
	
			mysql_query($sql_create, $conn) or die (mysql_error());
			mysql_query($sql_insert, $conn) or die (mysql_error());

		
			echo "new table created.";  
		
			mysql_close($conn);
		}
	}
	else {
		echo "This film does not exist acording to IMDB.\n";
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