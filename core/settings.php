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
        'host' => 'mysql5.000webhost.com',
        'username' => 'a7667035_user1',
        'password' => '2icVUGqrWy',
        'db' => 'a7667035_fyp',
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
