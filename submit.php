<?php

include("datalogin.php");

require_once('recaptchalib.php');

//prod
//$privatekey = "6LfR2vcSAAAAAAqLhylORlU0GPvPs1meLHQtvkg5";

//staging (heroku)
$privatekey = "6LeO7PcSAAAAAPcPk4ipRQThEznjOkyv1F_LEvVg";


if ($_POST) {

    if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        $output = json_encode(
            array(
                'type' => 'error',
                'text' => 'Request must come from ajax.'
            ));

        die($output);
    }

    if (!isset($_POST["name"]) || !isset($_POST["link"]) || !isset($_POST["host"])) {
        $output = json_encode(array('type' => 'error', 'text' => 'Input fields are empty!'));
        die ($output);
    }

    if (!isset($_POST["responseField"]))
    {
        $output = json_encode(array('type' => 'error', 'text' => 'CAPTCHA FIELDS EMPTY FOR FUCKS SAKE'));
        die ($output);
    }

    $resp = recaptcha_check_answer ($privatekey,
        $_SERVER["REMOTE_ADDR"],
        $_POST["challengeField"],
        $_POST["responseField"]);

    if (!$resp->is_valid) {
        $output = json_encode(array('type' => 'error', 'text' => 'The captcha was not entered correctly. Try again.'));
        die ($output);
    } else {

        $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
        $link = filter_var($_POST["link"], FILTER_SANITIZE_URL);
        $host = filter_var($_POST["host"], FILTER_SANITIZE_STRING);

        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $link)) {
            $output = json_encode(array('type' => 'error', 'text' => 'Not a valid URL.'));
            die ($output);
        }

        $name = urlencode($name);

        $json = file_get_contents("http://www.omdbapi.com/?t=$name");
        $details = json_decode($json);

        if ($details->Response == 'True') {
            $sql = "SHOW TABLES FROM `heroku_d78f3829bda1f61` LIKE '$name'";

            /*$output = json_encode(array('type' => 'message', 'text' => 'About to insert.'));
            die ($output . mysqli_error($link));*/

            //$retval = mysqli_query($conn, $sql);

            $retval = mysql_query($sql);

            if (mysqli_num_rows($retval)) {

                $sql = "INSERT INTO `$name` (`link`, `host`, `created`) VALUES ('$link', '$host', NOW())";

                //$retval = mysqli_query($conn, $sql);
                $retval = mysql_query($sql);


                if (!$retval) {
                    $output = json_encode(array('type' => 'error', 'text' => 'Could not enter data.'));
                    die ($output . mysqli_error($conn));
                }

                //mysqli_close($conn);

                $output = json_encode(array('type' => 'message', 'text' => 'Link entered successfully!'));
                die ($output);

                mysqli_close($conn);

            } else {

                $sql_create = "CREATE TABLE `$name`
					(id INT NOT NULL AUTO_INCREMENT,
					PRIMARY KEY (id),
					link VARCHAR(500),
					host VARCHAR (30),
					created DATETIME)
					";

                $sql_insert = "INSERT INTO `$name`
							(link, created, host)
							VALUES ('$conn','$host', NOW())";

                mysqli_query($conn, $sql_create) or die (mysql_error());
                mysqli_query($conn, $sql_insert) or die (mysql_error());

                mysqli_close($conn);

                $output = json_encode(array('type' => 'message', 'text' => 'Link entered successfully!'));
                die ($output);
            }
        } else {
            $output = json_encode(array('type' => 'error', 'text' => 'This movie does not exist. Please make sure you typed the name correctly.'));
            die ($output);
        }

    }
} else {
}

?>