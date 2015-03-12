<?php

/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 01/02/2015
 * Time: 18:01
 */
class profileFunctions
{

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
        $age = getAge($id, $this->db);

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
            $age = $userAge;
        }

        $this->db->endTransaction();

        return $age;
    }


//Get Interests

    function getUserInterests()
    {

        // $this->db->query("SELECT * FROM interests
        //   LEFT JOIN user_interests
        //   ON interests.interestId=user_interests.interestId
        //   AND user_interests.userId = ?");

        $this->db->query("SELECT interests.interest AS iUid, interests.interestId AS iId, interests.parent AS iP,
            user_interests.interestId AS uiIid, user_interests.userId AS uiUid 
            FROM interests 
            LEFT JOIN user_interests
            ON interests.interestId = user_interests.interestId
            AND user_interests.userId = ? 

            ");

        $this->db->addParameter($_SESSION['uid']);
        $this->db->execute();
        $rs = $this->db->resultSet();

        //var_dump($rs);
        $this->buildTree($rs, 0);
    }


    function buildTree($arr, $par)
    {
        echo "<ol>";
        foreach ($arr as $i) {
            if ($i['iP'] == $par) {
                echo '<li>';
                if (!$this->isParent($arr, $i)) {
                    echo '<input type="checkbox" name="interests[]" value="' . $i['iId'] . '"';
                    echo $this->isUserInterest($i) ? ' checked > ' : '> ';
                    echo $i['iUid'];
                    echo '</input>';
                } else {
                    echo $i['iUid'];
                }

                echo '</li>';
                echo '<br/>';


                $this->buildTree($arr, $i['iId']);
            }
        }
        echo "</ol>";
    }

    function isUserInterest($interest)
    {
        if ($interest['uiUid'] != NULL) {
            return true;
        }
        return false;
    }

    function isParent($arr, $interest)
    {
        foreach ($arr as $i) {
            if ($i['iP'] == $interest['iId']) {
                return true;
            }
        }

        return false;
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