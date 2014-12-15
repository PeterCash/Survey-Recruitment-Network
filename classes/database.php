<?php

/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 14/12/2014
 * Time: 18:15
 */
class database
{


    private static $_instance = null;
    private $_pdo,
        $_query,
        $_error = false,
        $_results,
        $_count = 0;

    private function __construct()
    {
        try {
            $this->_pdo = new PDO('mysql:host=' . getsettings::get('mysql/host') . ';dbname=' . getsettings::get('mysql/db'), getsettings::get('mysql/username'), getsettings::get('mysql/password'));
            //echo "Connected";
           // $this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            //echo 'Nope';
            die($e->getMessage());
        }


    }

    public static function getInstance()
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new database();
        }
        return self::$_instance;
    }

    public function query($sql, $parameters = array())
    {
        $this->error = false;
        if($this->_query = $this->_pdo->prepare($sql)){
            $i = 1;
            if(count($parameters)){
                foreach($parameters as $p){
                    $this->_query->bindValue($i, $p);
                    $i++;
                }
            }

            if($this->_query->execute()) {
                echo 'Success';
                $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
                $this->_count = $this->_query->rowCount();
            }else{
                //echo "Failed to execute";
                $this->_error=true;
            }

        }
        return $this;
    }

    public function error(){
        return $this->_error;
    }
}