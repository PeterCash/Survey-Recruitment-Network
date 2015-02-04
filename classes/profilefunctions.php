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


    function getChildren($root, $db)
    {

        $vChildTopics = $db->query("SELECT * FROM interests WHERE parent=?", array($root));


        $interestList = '';

        foreach ($vChildTopics->results() as $topic) {


            $interestList .= '<li>' . ($this->isParent($topic->interest_id, $db)) ? $this-> $topic->interest : getChildren($topic->interest_id,$db) . '</li>';

      /*      if ($this->isParent($topic->interest_id, $db)) {
                array_push($this->$interestList, $topic->interest);
                array_push($this->$interestList, $this->getChildren($topic->interest_id, $db, $output));
            }else{
                array_push($this->$interestList, $topic->interest);
            }*/


        }//End For Loop

        return '<ul>' . $interestList . '</ul>';


    }

    function isParent($root, $db)
    {
        $vIsParent = $db->query("SELECT * FROM interests WHERE parent=?", array($root));

        if ($vIsParent->count() > 0) {
            return true;
        } else {
            return false;
        }
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