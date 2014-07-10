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


   	$name = $_POST['name'];
   	$released = $_POST['released'];
    $runtime = $_POST['runtime'];
    $actors = $_POST['actors'];
    
    $sql = "INSERT INTO movies (Name, Released, Runtime, Actors, created) VALUES ('$name','$released', '$runtime', '$actors', NOW())";
       		
	mysql_select_db('movies');
	
	$retval = mysql_query($sql, $conn);
	
	if (!$retval)
	{
		die ('Could not enter data: ' . mysql_error());
	}
	echo "enetered data successfully\n";
	mysql_close($conn);
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
<td width = "100"> Actors</td>
<td><input name = "actors" type = "text" id = "actors"></td>
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