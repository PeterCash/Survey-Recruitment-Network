<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 01/02/2015
 * Time: 18:01
 */
require_once '../core/settings.php';


$db = database::getInstance();


function getDateOfBirth($id)
{
    $this->$db->query("SELECT * FROM user_profiles WHERE user_id=?", array($id));

    if (isset($this->$db->first()->user_id)) {
        $date = $this->$db->first()->date_of_birth;
        return $this->convertDate($date);
    }

}

function convertDate($date)
{
    return date('jS F Y', strtotime($date));
}

function getAgeRange($id)
{
    $age = getAge($id);

    if ($age >= 65) {
        return "65 and over";
    } else {
        $this->$db->query("SELECT * FROM age_range WHERE ? BETWEEN min AND max", array($age));
        return $this->$db->first()->label;
    }
}

function getAge($id)
{
    $this->$db->query("SELECT * FROM user_profiles WHERE user_id=?", array($id));

    if (isset($this->$db->first()->user_id)) {
        $date = new DateTime($this->$db->first()->date_of_birth);
        $today = new DateTime('today');
        // $today->format('Y-m-d H:i:s');
        // '<br/>';
        return $date->diff($today)->y;
    }
}


//Get Interests


function getChildren($inputArray, $root, $this->$db){
    foreach ($inputArray as $r) {
        if ($r->parent == $root) {

            if (isParent($r->interest_id, $inputArray) == false) {

                if (>userInterest($r->interest_id, $this->$db)) {
                    echo '<label><input value="' . $r->interest_id . '" type="checkbox" name="interests[]" checked>' . $r->interest . '</label>';
                } else {
                    echo '<label><input value="' . $r->interest_id . '" type="checkbox" name="interests[]">' . $r->interest . '</label>';
                }
                } else {
                echo '<label name="interests[]">' . $r->interest . '</label>';
            }


            echo '<br/>';


            if (isParent($r->interest_id, $inputArray)) {
                echo '<ul class="interestGroup">';
                getChildren($inputArray, $r->interest_id, $this->$db);
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

    function userInterest($interestID, $this->$db)
    {
        $uid = $_SESSION['uid'];
        $vUserInterests = $this->$db->query("SELECT * FROM userinterests WHERE user_id=? AND interest_id=?", array($uid, $interestID));

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

}
?>