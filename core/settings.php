<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 14/12/2014
 * Time: 18:20
 */
session_start();

$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => 'sql3.freesqldatabase.com',
        'username' => 'sql368720',
        'password' => 'kU6*xT5*',
        'db' => 'sql368720',
/*        'host' => 'eas-fyphost-02.aston.ac.uk:1000',
        'username' => 'cashp',
        'password' => 'cashp992',
        'db' => 'cashp',*/
    ),
    'remember' => array(
        'cookie_name' => 'hash',
        'cookie_expiry' => 604800,

    ),
    'session' => array(
        'session_name' => 'user'
    ),
);

spl_autoload_register(function($class) {
    require_once '../classes/' . $class . '.php.';
});


require_once '../functions/sanitise.php';
