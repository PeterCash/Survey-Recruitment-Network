<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 14/12/2014
 * Time: 18:12
 */
require_once '../core/settings.php';

session_destroy();

header('location: index.php');