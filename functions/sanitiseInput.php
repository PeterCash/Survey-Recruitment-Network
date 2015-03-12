<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 14/12/2014
 * Time: 18:20
 */
function escape($string) {
    $cleaned = filter_var($string, FILTER_SANITIZE_STRING);
	return $cleaned;
};