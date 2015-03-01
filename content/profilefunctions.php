<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 01/02/2015
 * Time: 18:01
 */

class profileFunctions{

private $db;


public function __construct($database)
{
$this->db = $database;
}


function getUser()
{
    $this->db->beginTransaction();
    $this->db->query("SELECT * FROM user_profiles
                INNER JOIN users
                ON user_profiles.userId = users.userId
                WHERE user_profiles.userId=?");
    $this->db->addParameter($_SESSION['uid']);
    $profile = $this->db->single();
   return $profile;
    $this->db->endTransaction();


}

function getDateOfBirth()
{
    $this->db->beginTransaction();
    $this->db->query("SELECT * FROM user_profiles
                WHERE userId=?");
    $this->db->addParameter($_SESSION['uid']);

    if ($this->db->hasResults()) {
        $date = $this->db->single()['dateOfBirth'];
        $dob = $this->convertDate($date);
    }

    $this->db->endTransaction();

    return $dob;

}

function convertDate($date)
{
    return date('jS F Y', strtotime($date));
}

function getAgeRange()
{
    $age = getAge($id,$this->db);

    if ($age >= 65) {
        return "65 and over";
    } else {
        $this->$this->db->query("SELECT * FROM age_range
                    WHERE ? BETWEEN min AND max",
                    array($age));

        return $this->$this->db->first()->label;
    }
}

function getAge()
{
    $this->db->beginTransaction();
    $this->db->query("SELECT * FROM user_profiles
        WHERE userId=?");
    $this->db->addParameter($_SESSION['uid']);

    if ($this->db->hasResults()) {
        $bday = $this->db->single()['dateOfBirth'];
        $bday = new DateTime($bday);

        // '<br/>';
    $userAge = $bday->diff(new DateTime)->y;
        $age =  $userAge;
    }

    $this->db->endTransaction();

    return $age;
}


//Get Interests

function getUserInterests()
{
    $this->db->beginTransaction();
    
    $this->db->query("SELECT * FROM interests");
    $this->db->execute();
    $rs = $this->db->resultSet();
    $this->db->endTransaction();
    
    return $this->getChildren($rs,0);

}


function getChildren($inputArray, $root){
    foreach ($inputArray as $r) {
        if ($r['parent'] == $root) {

            if ($this->isParent($r['interestId'], $inputArray) == false) {

                if ($this->userInterest($r['interestId'])) {
                    echo '<label><input value="' . $r['interestId'] . '" type="checkbox" name="interests[]" checked>' . $r['interest'] . '</label>';
                } else {
                    echo '<label><input value="' . $r['interestId'] . '" type="checkbox" name="interests[]">' . $r['interest'] . '</label>';
              }
                } else {
                echo '<div class="panel radius alternate" style="">';
                echo '<label name="interests[]" class="padded-checkbox">' . $r['interest'] . '</label>';
            }


            echo '<br/>';


            if ($this->isParent($r['interestId'], $inputArray)) {

                echo '<ul class="interestGroup">';
                $this->getChildren($inputArray, $r['interestId']);
                echo '</ul>';
                echo '</div>';
            }
        }
    }
}

    function isParent($commentID, $commentArray)
    {
        foreach ($commentArray as $r) {
            if ($r['parent'] == $commentID) {
                return true;
            }
        }

        return false;

    }

    function userInterest($interestID)
    {
        $uid = $_SESSION['uid'];
        $this->db->query("SELECT * FROM user_interests
                                      WHERE userId=?
                                      AND interestId=?");
        $this->db->addParameter($uid);
        $this->db->addParameter($interestID);
    

        if ($this->db->hasResults()) {
            return true;
        } else {
            return false;
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