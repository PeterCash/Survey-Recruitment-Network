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
            return date('jS F Y', strtotime($date));
        }

    }

    public function getAge($id)
    {
        $this->db->query("SELECT * FROM user_profiles WHERE user_id=?", array($id));

        if (isset($this->db->first()->user_id)) {
            $date =  new DateTime($this->db->first()->date_of_birth);
            $today = new DateTime('today');
            echo $today->format('Y-m-d H:i:s');
            echo '<br/>';
            return $date->diff($today)->y;
        }
    }

    public function convertDate($date)
    {
        return date('jS F Y', strtotime($date));
    }

}