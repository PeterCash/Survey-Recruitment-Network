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

    public function getFullTree()
    {
        $this->db->query("SELECT * FROM interests WHERE lineage IS NOT NULL ORDER BY lineage");
        $this->db->execute();


        if ($this->db->hasResults()) {
            $rs = $this->db->resultset();
            return $rs;
        }

        return NULL;
    }

    public function getChildren($root)
    {
        $this->db->query("SELECT * FROM interests");
        $this->db->addParameter($root);
        $this->db->execute();


        if ($this->db->hasResults()) {
            $rs = $this->db->resultset();
            return $this->buildTree($rs, $root);
        }

        return NULL;
    }

    function buildTree($arr, $par)
    {
        foreach ($arr as $i) {
            if ($i['parent'] == $par) {
                if (!$this->isParent($arr, $i)) {
                    $this->fullTree[] = $i;
                }
            } else {
                $this->fullTree[] = $i;
            }

            $this->buildTree($arr, $i['interestId']);
        }
    }
}

function isParent($arr, $interest)
{
    foreach ($arr as $i) {
        if ($i['parent'] == $interest['interestId']) {
            return true;
        }
    }
}