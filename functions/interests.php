<?php

/**
 * Created by PhpStorm.
 * User: cashp
 * Date: 13/03/2015
 * Time: 11:46
 */
class interests
{

    private $db;
    private $fullTree = array();

    public function __construct($database)
    {
        $this->db = $database;
    }

    public function getInterestFromID($interestID)
    {
        $this->db->query("SELECT * FROM interests WHERE interestId=?");
        $this->db->addParameter($interestID);
        $this->db->execute();

        if($this->db->single() != NULL)
        {
            return $this->db->single();
            var_dump($this->db->single());
        }

        return null;
    }

    public function getFullTree()
    {
        $this->db->query("SELECT * FROM interests ORDER BY lineage,length(lineage)");
        $this->db->execute();


        if ($this->db->hasResults()) {
            $rs = $this->db->resultset();
            return $rs;
        }

        return NULL;
    }

    public function getSiblings($depth)
    {
        $this->db->query("SELECT * FROM interests WHERE depth=? ORDER BY lineage,length(lineage)");
        $this->db->addParameter($depth);
        $this->db->execute();


        if ($this->db->hasResults()) {
            return $this->db->resultset();
        }

        return NULL;
    }

/*    public function getChildren($interest)
    {
        $parentInterest = $this->getInterestFromID($interest);

        $this->db->query("SELECT * FROM interests WHERE lineage LIKE ? AND depth = ? ORDER BY lineage,length(lineage)");
        $this->db->addParameter($parentInterest['lineage'] . '%');
        $this->db->addParameter($parentInterest['depth'] + 1);
        $this->db->execute();


        if ($this->db->hasResults()) {
            return $this->db->resultset();
        }

        return NULL;
    }*/

    public function getDescendants($interest)
    {
        $parentInterest = $this->getInterestFromID($interest);

        $this->db->query("SELECT * FROM interests WHERE lineage LIKE ? AND depth > ? ORDER BY lineage,length(lineage)");
        $this->db->addParameter($parentInterest['lineage'] . '%');
        $this->db->addParameter($parentInterest['depth']);
        $this->db->execute();


        if ($this->db->hasResults()) {
            return $this->db->resultset();
        }

        return NULL;
    }

    public function getAncestors($interest)
    {

        $parentInterest = $this->getInterestFromID($interest);

        $ancestors = $parentInterest['lineage'];
        $top = explode("-",$ancestors);
        $top = $top[0];

        var_dump($top);

        $this->db->query("SELECT * FROM interests WHERE lineage LIKE ? AND depth < ? ORDER BY lineage,length(lineage)");
        $this->db->addParameter($top + '%');
        $this->db->addParameter($parentInterest['depth']);
        $this->db->execute();


        if ($this->db->hasResults()) {
            return $this->db->resultset();
        }

        return NULL;
    }

    public function getParent($interest)
    {
        $parentInterest = $this->getInterestFromID($interest);

        $this->db->query("SELECT * FROM interests WHERE interestId = ? ORDER BY lineage,length(lineage)");
        $this->db->addParameter($parentInterest['parent']);
        $this->db->execute();


        if ($this->db->hasResults()) {
            return $this->db->resultset();
        }

        return NULL;
    }

    public function getChildren($interest)
    {

        $this->db->query("SELECT *  FROM interests WHERE parent=? ORDER BY lineage,length(lineage)");
        $this->db->addParameter($interest);
        $this->db->execute();


        if ($this->db->hasResults()) {
            return $this->db->resultset();
        }

        return NULL;
    }
}

