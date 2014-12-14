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

private function _construct()
{
    try {
    $this->_pdo=new PDO('mysql:host=' . getsettings::get('mysql/host') . ';dbname=' . getsettings::get('mysql/db'), getsettings::get('mysql/username'), getsettings::get('mysql/password'));
    echo _pdo;
    } catch (PDOException $e) {
        echo 'Nope';
        die($e->getMessage());
    }


}

    public static function getInstance(){
        if(!isset(self::$_instance))
        {
            self::$_instance=new database();
        }
        return self::$_instance;
    }
}