<?php

/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 14/12/2014
 * Time: 18:14
 */
class getsettings
{

    public static function getvalue($path = null)
    {
        if (isset($path)) {

            while (substr($path, -1) == '/') {
                $path = substr($path, 0, strlen($path) - 1);
            }

            $config = $GLOBALS['config'];
            $path = explode('/', $path);

            foreach ($path as $word) {
                if (is_array($config) && array_key_exists($word, $config)) {
                    $config = $config[$word];
                } else {
                    die('This array could not be found');
                }
            }

            return $config;
        }
        return false;
    }
}

