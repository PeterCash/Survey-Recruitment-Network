<?php
/**
 * Created by PhpStorm.
 * User: cashp
 * Date: 12/02/2015
 * Time: 12:51
 */
http://stackoverflow.com/questions/12556805/how-to-grab-data-from-post-to-a-class


function getCounties($db)
{
    $db->query("SELECT * FROM counties", array());

    return $db->results();
}

function checkEmptyPost($PostArray)
{
    foreach ($PostArray as $post) {
        if (is_null($post)) {
            return false;
        }
    }
    return true;
}

function echoDetails()
{
    echo $_POST['age'];
}


