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

    public function __construct($database)
    {
        $this->db = $database;
    }


    /**
     * @param $interestID A valid user interest
     * @return A user interest qa
     */
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


    /**
     * @return The full ordered tree of interests.
     */
    public function getFullTree()
    {
        $this->db->query("SELECT DISTINCT a.interestId,a.interest,a.lineage,a.depth, b.interestId IS NOT NULL AS isParent
                          FROM interests a
                          LEFT JOIN interests b ON a.interestId = b.parent
                          ORDER BY a.lineage,length(a.lineage)");
        $this->db->execute();


        if ($this->db->hasResults()) {
            $rs = $this->db->resultset();
            return $rs;
        }

        return NULL;
    }

    /**
     * @param $depth The interest depth or level in the hierarchy.
     * @return Every interest at the same level.
     */
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

    /**
     * @param $interest A valid interest
     * @return Get every interest below a given interest
     */
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


    /**
     * @param $interest A valid interest
     * @return Every interest above a given interest
     */
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

    /**
     * @param $interest Get the parent interest
     * @return Immediate parent interest of an interest
     */
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

    /**
     * @param $interest A valid user interest
     * @return Get immediate children for a given interest.
     */
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

    /**
     * @param $userId A valid userId
     * @return Returns only the interests for a user.
     */
    public function getInterestsForUser($userId)
    {
        $this->db->query("SELECT *  FROM user_interests
                          INNER JOIN interests ON user_interests.interestId = interests.interestId
                          WHERE user_interests.userId = ?");
        $this->db->addParameter($userId);
        $this->db->execute();


        if ($this->db->hasResults()) {
            return $this->db->resultset();
        }

        return NULL;
    }

    /**
     * @param $userId A valid userId
     * @return All stored interests and flag up user interests
     */
    public function getInterestsWithFlags($userId)
    {
        $this->db->query("SELECT DISTINCT a.interestId,a.interest,a.lineage,a.depth, b.interestId IS NOT NULL AS isParent, user_interests.userId IS NOT NULL AS isUserInterest
                          FROM interests a
                          LEFT JOIN interests b ON a.interestId = b.parent
                          LEFT JOIN user_interests ON a.interestId = user_interests.interestId
                          AND user_interests.userId = ?
                          ORDER BY a.lineage,length(a.lineage)");
        $this->db->addParameter($userId);
        $this->db->execute();


        if ($this->db->hasResults()) {
            return $this->db->resultset();
        }

        return NULL;
    }

    public function getParentChild()
    {
        $this->db->query("SELECT a.interest AS theparent, b.interest AS thechild
                          FROM interests a
                          INNER JOIN interests b
                          ON a.interestId = b.parent");
        $this->db->execute();


        if ($this->db->hasResults()) {
            return $this->db->resultset();
        }

        return NULL;
    }
}

