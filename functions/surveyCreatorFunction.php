<?php
/**
 * Created by PhpStorm.
 * User: cashp
 * Date: 12/02/2015
 * Time: 12:51
 */
//http://stackoverflow.com/questions/12556805/how-to-grab-data-from-post-to-a-class


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




function getChildren2($inputArray, $root, $db){
    foreach ($inputArray as $r) {
        if ($r->parent == $root) {

            if (isParent2($r->interestId, $inputArray) == false) {
                    echo '<label><input value="' . $r->interestId . '" type="checkbox" name="interests[]">' . $r->interest . '</label>';
             
                } else {
                echo '<div class="panel radius alternate" style="">';
                echo '<label name="interests[]" class="padded-checkbox">' . $r->interest . '</label>';
            }


            echo '<br/>';


            if (isParent2($r->interestId, $inputArray)) {

                echo '<ul class="interestGroup">';
                getChildren2($inputArray, $r->interestId, $db);
                echo '</ul>';
                echo '</div>';
            }
        }
    }
}

    function isParent2($commentID, $commentArray)
    {
        foreach ($commentArray as $r) {
            if ($r->parent == $commentID) {
                return true;
            }
        }

        return false;

    }


