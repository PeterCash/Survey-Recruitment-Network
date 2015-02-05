<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 01/02/2015
 * Time: 18:01
 */
require_once '../core/settings.php';

class profilefunctions

{
    protected $db = null;




    public function __construct($database)
    {
        $this->db = $database;
    }


    public function getDateOfBirth($id)
    {
        $this->db->query("SELECT * FROM user_profiles WHERE user_id=?", array($id));

        if (isset($this->db->first()->user_id)) {
            $date =  $this->db->first()->date_of_birth;
            return convertDate($date);
        }

    }

    public function convertDate($date)
    {
        return date('jS F Y', strtotime($date));
    }

    public function getAgeRange($id)
    {
        $age = $this->getAge($id);

        if($age >= 65){
            return "65 and over";
        }else{
            $this->db->query("SELECT * FROM age_range WHERE ? BETWEEN min AND max", array($age));
            return $this->db->first()->label;
        }
    }

    public function getAge($id)
    {
        $this->db->query("SELECT * FROM user_profiles WHERE user_id=?", array($id));

        if (isset($this->db->first()->user_id)) {
            $date =  new DateTime($this->db->first()->date_of_birth);
            $today = new DateTime('today');
            // $today->format('Y-m-d H:i:s');
            // '<br/>';
            return $date->diff($today)->y;
        }
    }



    //Get Interests


    function getChildren($inputArray, $root){
        foreach($inputArray as $r)
        {
            if($r->parent == $root)
            {
                echo '<li>' . $r->interest . '</li>';

                if($this->isParent($r->interest_id, $inputArray))
                {
                    echo '<ul>';
                    $this->getChildren($inputArray, $r->interest_id);
                    echo '</ul>';
                }
            }
        }
    }

    function isParent($commentID, $commentArray)
    {
        foreach($commentArray as $r)
        {
            if($r->parent == $commentID)
            {
                return true;
            }
        }

        return false;

    }

    function userInterest($interestID, $db)
    {
        $uid = $_SESSION['uid'];
        $vUserInterests = $db->query("SELECT * FROM userinterests WHERE user_id=? AND interest_id=?", array($uid, $interestID));

        if ($vUserInterests->count() < 1) {
            return false;
        } else {
            return true;
        }
    }

    //End get interests




    public function getSurveysCreated()
    {

    }

    public function getSurveysCompleted()
    {

    }

}