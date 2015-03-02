<?php
/**
 * Created by PhpStorm.
 * User: cashp
 * Date: 12/02/2015
 * Time: 12:51
 */
//http://stackoverflow.com/questions/12556805/how-to-grab-data-from-post-to-a-class

session_start();

class surveyCreatorFunctions{

    private $db;


    public function __construct($database)
    {
        $this->db = $database;
    }

    function getCounties()
    {
        $this->db->beginTransaction();
        $this->db->query("SELECT * FROM counties");
        $this->db->execute();
        $counties = $this->db->resultSet();
        $this->db->endTransaction();


        return $counties;
    }

    function checkEmptyPost($PostArray)
    {
        foreach ($PostArray as $post) {
            if (is_null($post)) {
                return false;
            }
        }
        return true;
    }


    function getChildren2($root){
        $this->db->query("SELECT * FROM interests");
        $this->db->addParameter($root);
        $this->db->execute();


        if($this->db->hasResults()){
            $rs = $this->db->resultset();
            $this->buildTree($rs,$root);
        }
    }

    function buildTree($arr, $par)
    {
        foreach($arr as $interest)
        {
            if($interest['parent'] == $par)
            {
                echo "<li>" . $interest['interest'] . "</li>";
                echo "<br/>";

                echo "<ol>";
                $this->buildTree($arr,$interest['interestId']);
                echo "</ol>";
            }
        }
    }

}

?>
