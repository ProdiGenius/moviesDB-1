<?php

include ("datalogin.php");

$html = '';
$html .= '<ul><li class="result">';
$html .= '<a href="urlString">';
$html .= '<h3>nameString</h3></a>';
$html .= '</li>';
$html .= '</ul>';

$search_string = preg_replace("/[^A-Za-z0-9]/", " ", $_POST['query']);
$search_string = str_replace(" ", "+", $search_string);
$search_string = strtolower($search_string);

if (strlen($search_string) >= 1 && $search_string !== '')
{
    //$sql = "SHOW TABLES FROM `movies` LIKE '%$search_string'";
    //$sql = "SHOW TABLES FROM `yossil01_movies` LIKE '%$search_string'";
    $sql = 'SHOW TABLES FROM `heroku_d78f3829bda1f61` LIKE "%' .$search_string. '%"';

    $query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $count = mysqli_num_rows($query);

    $counter = 0;

    if ($count > 0)
    {
        while($row = mysqli_fetch_array($query))
        {
            if ($counter < 5)
            {
                $table_name = $row[0];

                $search_string = str_replace(" ", "+", $search_string);

                if (strpos($table_name, $search_string) !== false)
                {

                    $search_string = str_replace("+", " ", $search_string);

                    $decoded_name = urldecode($table_name);
                    $decoded_name = ucwords($decoded_name);

                    $display_name = preg_replace("/".$decoded_name."/i", "$decoded_name", $decoded_name);
                    $display_url = 'movie.php?id='.$table_name;

                    $output = str_replace('nameString', $display_name, $html);
                    $output = str_replace('urlString', $display_url, $output);

                    echo($output);
                }
            }
            else {
                break;
            }

        }

    } else {
        $output = str_replace('urlString', 'JavaScript:void(0)', $html);
        $output = str_replace('nameString', 'No results found.', $html);

        echo($output);
    }
}


?>