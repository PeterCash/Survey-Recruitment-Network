<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 14/12/2014
 * Time: 18:20
 */
function escape($string) {
    return htmlentities($string,'ENT_QUOTES','UTF-8');
};