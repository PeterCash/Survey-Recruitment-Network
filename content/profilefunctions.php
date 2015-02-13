<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 01/02/2015
 * Time: 18:01
 */
require_once '../core/settings.php';


$db = database::getInstance();

function getUser($id, $db)
{
    $db->query("SELECT * FROM user_profiles INNER JOIN users ON user_profiles.userId = users.userId WHERE user_profiles.userId=?", array($id));

    return $db->first();


}

function getDateOfBirth($id, $db)
{
    $db->query("SELECT * FROM user_profiles WHERE userId=?", array($id));

    if (isset($db->first()->userId)) {
        $date = $db->first()->dateOfBirth;
        return convertDate($date);
    }

}

function convertDate($date)
{
    return date('jS F Y', strtotime($date));
}

function getAgeRange($id, $db)
{
    $age = getAge($id,$db);

    if ($age >= 65) {
        return "65 and over";
    } else {
        $this->$db->query("SELECT * FROM age_range WHERE ? BETWEEN min AND max", array($age));
        return $this->$db->first()->label;
    }
}

function getAge($id, $db)
{
    $db->query("SELECT * FROM user_profiles WHERE userId=?", array($id));

    if (isset($db->first()->userId)) {
        $date = new DateTime($db->first()->dateOfBirth);
        $today = new DateTime('today');
        // $today->format('Y-m-d H:i:s');
        // '<br/>';
        return $date->diff($today)->y;
    }
}


//Get Interests


function getChildren($inputArray, $root, $db){
    foreach ($inputArray as $r) {
        if ($r->parent == $root) {

            if (isParent($r->interestId, $inputArray) == false) {

                if (userInterest($r->interestId, $db)) {
                    echo '<label><input value="' . $r->interestId . '" type="checkbox" name="interests[]" checked>' . $r->interest . '</label>';
                } else {
                    echo '<label><input value="' . $r->interestId . '" type="checkbox" name="interests[]">' . $r->interest . '</label>';
                }
                } else {
                echo '<label name="interests[]">' . $r->interest . '</label>';
            }


            echo '<br/>';


            if (isParent($r->interestId, $inputArray)) {
                echo '<ul class="interestGroup">';
                getChildren($inputArray, $r->interestId, $db);
                echo '</ul>';
            }
        }
    }
}

    function isParent($commentID, $commentArray)
    {
        foreach ($commentArray as $r) {
            if ($r->parent == $commentID) {
                return true;
            }
        }

        return false;

    }

    function userInterest($interestID, $db)
    {
        $uid = $_SESSION['uid'];
        $vUserInterests = $db->query("SELECT * FROM user_interests WHERE userId=? AND interestId=?", array($uid, $interestID));

        if ($vUserInterests->count() < 1) {
            return false;
        } else {
            return true;
        }
    }

    //End get interests




    function getSurveysCreated()
    {

    }

    function getSurveysCompleted()
    {

    }


?>