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


    public function getAge($id)
    {
      $this->db->query("SELECT * FROM user_profiles WHERE user_id=?", array($id));

        if (isset($this->db->first()->user_id)) {
            return $this->db->first()->user_id;
        }

    }

}