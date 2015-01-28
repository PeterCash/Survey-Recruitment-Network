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
            $this->_pdo = new PDO('mysql:host=' . getsettings::getvalue('mysql/host') . ';dbname=' . getsettings::getvalue('mysql/db'), getsettings::getvalue('mysql/username'), getsettings::getvalue('mysql/password'));
            echo "<script type='text/javascript'>alert('Connected');</script>";
             //$this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            echo "<script type='text/javascript'>alert('Not Connected'');</script>";
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
        if ($this->_query = $this->_pdo->prepare($sql)) {
            $i = 1;
            if (count($parameters)) {
                foreach ($parameters as $param) {
                    $this->_query->bindValue($i, $param);
                    $i++;
                }
            }

            if ($this->_query->execute()) {
                //echo 'Success';
                $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
                $this->_count = $this->_query->rowCount();
            } else {
                //echo "Failed to execute";
                $this->_error = true;
            }

        }
        return $this;
    }
	
    public function results()
    {
        return $this->_results;
    }

    public function first()
    {
        $output = $this->results();
        return $output[0];
    }

    public function count(){
        return $this->_count;
    }

    public function error()
    {
        return $this->_error;
    }
}