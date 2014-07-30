<html>
<head>
<title>Add a New Movie</title>
	<script type="text/javascript">
		function checkLinks(){
			var valid_domains = new Array("ovfile.com", "videozer.com", "royalvids.eu", "divxstage.eu",
			"divxstage.net", "veevr.com", "gorillavid.com", "gorillavid.in", "megavideo", "movshare.net",
			"zshare", "tudou", "youtube", "youku", "vidbux.com", "putlocker.com", "sockshare.com",
			"videobb.com", "videoweed.es", "videoweed.com", "smotri.com", "fairyshare.com", "milledrive.com",
			"divxden.com", "vidxden.com", "miloyski.com", "sina.com", "putfile.com", "novamov.com",
			"wisevid.com", "loombo.com", "vidbux.com", "zalaa.com", "vidhog.com", "xvidstage.com",
			"nowvideo.eu", "divxbase.com", "nosvideo.com", "vidbull.com", "mooshare.biz", "180upload.com",
			"videobam.com", "allmyvideos.net", "modovideo.com", "vidspot.net", "vodlocker.com", "movreel.com",
			"video.tt", "faststream.in", "vidto.me", "firedrive.com");
			inputs = document.getElementById('host','link').elements;
			validation = true;		
			for(i=1; i<inputs.length -1; i++){
				if(inputs[i].value.length > 0){
					valid = false;
					for(did in valid_domains){
						if((" " + inputs[i].value).indexOf(valid_domains[did]) > 0){
							valid = true;
							break;
						}
					}					
					if(valid == false){
						alert("This host is not allowed: " + inputs[i].value);
						validation = false;
						inputs[i].focus();
						break;
					}
				}
			}			
			return validation;
		}
	</script>
</head>

<body>
<?php

include 'datalogin.php';

if (isset($_POST['add']))
{
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
	
		$retval = mysql_query($sql, $conn);
	
		if (mysql_num_rows($retval))   {
			
			$sql = "INSERT INTO `$name` (link, created) VALUES ('$link', NOW())";
				
			$retval = mysql_query($sql, $conn);
	
			if (!$retval)
			{
				die ('Could not enter data: ' . mysql_error());
			}
	
			mysql_close($conn);
		} else {
		
			$sql_create = "CREATE TABLE `$name`
					(id INT NOT NULL AUTO_INCREMENT, 
					PRIMARY KEY (id), 
					link VARCHAR(500), 
					created DATETIME,
					host CHAR(30))
					";
				
			$sql_insert= "INSERT INTO `$name`
							(link, created, host)
							VALUES ('$link','$host', NOW())";
	
			mysql_query($sql_create, $conn) or die (mysql_error());
			mysql_query($sql_insert, $conn) or die (mysql_error());
		
			mysql_close($conn);
		}
	}
	else {
		echo "This movie does not exist.";

	}
} else {

?>

<form onsubmit="return checkLinks();" method ="post" action = "<?php $_PHP_SELF?>">
<table width="400" border = "0" cellspacing = "1" cellpadding = "2">
<tr>
<td width = "100">Movie Name</td>
<td><input name = "name" type = "text" id = "name" autocomplete="off"></td>
</tr>

<tr>
<td width = "100">Link</td>
<td><input name = "link" type = "text" id = "link" autocomplete="off"></td>
</tr>

<tr>
<td width = "100">Host Site</td>
<td><input name = "host" type = "text" id = "host" autocomplete="off"></td>
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