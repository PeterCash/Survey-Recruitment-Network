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
        host => '127.0.0.1',
        username => 'root',
        password => '',
        db => 'athena',
    ),
    'remember' => array(
        'cookie_name' => 'hash',
        'cookie_expiry' => 604800,

    ),
    'session' => array(
        'session_name' => 'user'
    ),
);

spl_autoload_register(function ($class) {
    require_once 'classes/' . $class . '.php.';
});