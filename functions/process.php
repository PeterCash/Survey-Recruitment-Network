<?php
/**
 * Created by PhpStorm.
 * User: cashp
 * Date: 09/02/2015
 * Time: 15:06
 */
require_once '../core/settings.php';

$database = database::getInstance();

$checker = new loginAuthenticator($_POST['username'], $_POST['password'], $database);

if ($checker->checkCredentials()) {
    echo 'true';
} else {
    echo 'false';
}