<?php
/**
 * Created by PhpStorm.
 * User: cashp
 * Date: 12/02/2015
 * Time: 12:51
 */http://stackoverflow.com/questions/12556805/how-to-grab-data-from-post-to-a-class

class CreateASurvey {

    private $db;
    private $title;
    private $age;

    public function __construct()
    {
       echo $_POST['age'];

    }

    public function checkEmptyPost($PostArray)
    {
        foreach($PostArray as $post)
        {
            if(is_null($post)){
                return false;
            }
        }
        return true;
    }

    public function echoDetails()
    {
        echo $_POST['age'];
    }


}