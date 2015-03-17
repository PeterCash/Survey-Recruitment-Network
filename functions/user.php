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
    private $UserID;


    public function __construct($database, $UserID)
    {
        $this->db = $database;
        $this->UserID = $UserID;
    }


    function getUser()
    {
        $returnStatements = NULL;

        $this->db->beginTransaction();
        $this->db->query("SELECT * FROM user_profiles
            INNER JOIN users
            ON user_profiles.userId = users.userId
            WHERE user_profiles.userId=?");
        $this->db->addParameter($this->userId);
        $this->db->execute();


        if ($this->db->hasResults()) {
            $returnStatements = $this->db->single();
        }

        $this->db->endTransaction();

        return $returnStatements;


    }

    function getDateOfBirth()
    {
        $returnStatements = NULL;

        $this->db->beginTransaction();
        $this->db->query("SELECT * FROM user_profiles
            WHERE userId=?");
        $this->db->addParameter($_SESSION['uid']);

        if ($this->db->hasResults()) {
            $date = $this->db->single()['dateOfBirth'];
            $returnStatements = $this->convertDate($date);
        }

        $this->db->endTransaction();

        return $returnStatements;

    }

    function convertDate($date)
    {
        return date('jS F Y', strtotime($date));
    }

    function getAgeRange()
    {
        $age = getAge();

        if ($age >= 65) {
            return "65 and over";
        } else {
            $this->db->query("SELECT * FROM age_range
                WHERE ? BETWEEN min AND max");
            $this->db->addParameter($age);

            return $this->db->single()['label'];
        }
    }

    function getAge()
    {
        $returnStatements = NULL;

        $this->db->beginTransaction();
        $this->db->query("SELECT * FROM user_profiles
            WHERE userId=?");
        $this->db->addParameter($_SESSION['uid']);

        if ($this->db->hasResults()) {
            $bday = $this->db->single()['dateOfBirth'];
            $bday = new DateTime($bday);

            // '<br/>';
            $returnStatements = $bday->diff(new DateTime)->y;
        }

        $this->db->endTransaction();

        return $returnStatements;
    }


//Get Interests

}




?>