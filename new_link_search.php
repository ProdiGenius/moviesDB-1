<?php

include ("datalogin.php");

if ($_POST)
{
    if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        $output = json_encode(
            array(
                'type' => 'error',
                'text' => 'Request must come from ajax.'
            ));

        die($output);
    }

    $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);

    $name = urlencode($name);

    $json = file_get_contents("http://www.omdbapi.com/?t=$name");

    $details = json_decode($json);

    if ($details->Response == 'True')
    {
        $output = json_encode(array('type' => 'message', 'text' => '<b>' . $details->Title . ' ' . $details->Year . ' </b> <br>' . $details->Plot . '<br> <i>Not what you are looking for? Make sure the name of the film is correctly typed.</i>));
        die ($output);
    }

}



?>