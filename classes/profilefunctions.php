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
        $now = new DateTime(null, new DateTimeZone('Europe/London'));

        $dob = $this->getDateOfBirth($id);

        $today = date("D M y");


        return $today - $dob;

    }

}