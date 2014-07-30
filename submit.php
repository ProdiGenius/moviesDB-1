<?php

include 'datalogin.php';

if ($_POST)
{

    if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest')
    {
        $output = json_encode(
            array(
                'type' => 'error',
                'text' => 'Request must come from ajax.'
        ));

        die($output);
    }

    if (!isset($_POST["name"]) || !isset($_POST["link"]) || !isset($_POST["host"]))
    {
        $output = json_encode(array('type' => 'error', 'text' => 'Input fields are empty!'));
        die ($output);
    }

    $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    $link = filter_var($_POST["link"], FILTER_SANITIZE_URL);
    $host = filter_var($_POST["host"], FILTER_SANITIZE_STRING);

    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $link))
    {
        $output = json_encode(array('type' => 'error', 'text' => 'Not a valid URL.'));
        die ($output);
    }

    $name = urlencode($name);

    $json = file_get_contents("http://www.omdbapi.com/?t=$name");
    $details = json_decode($json);

    if ($details->Response=='True')
    {
        $sql = "SHOW TABLES LIKE '$name'";

        $retval = mysql_query($sql, $conn);

        if (mysql_num_rows($retval))   {

            $sql = "INSERT INTO `$name` (link, host, created) VALUES ('$link', '$host', NOW())";

            $retval = mysql_query($sql, $conn);

            if (!$retval)
            {
                die ('Could not enter data: ' . mysql_error());
            }

            mysql_close($conn);

            $output = json_encode(array('type' => 'message', 'text' => 'Link entered successfully!'));
            die ($output);
        } else {

            $sql_create = "CREATE TABLE `$name`
					(id INT NOT NULL AUTO_INCREMENT,
					PRIMARY KEY (id),
					link VARCHAR(500),
					host VARCHAR (30),
					created DATETIME)
					";

            $sql_insert= "INSERT INTO `$name`
							(link, created, host)
							VALUES ('$link','$host', NOW())";

            mysql_query($sql_create, $conn) or die (mysql_error());
            mysql_query($sql_insert, $conn) or die (mysql_error());

            mysql_close($conn);

            $output = json_encode(array('type' => 'message', 'text' => 'Link entered successfully!'));
            die ($output);
        }
    }
    else {
        echo "This movie does not exist.";

    }
} else { }

?>