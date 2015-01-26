/**
* Created by PhpStorm.
* User: Peter
* Date: 14/12/2014
* Time: 17:50
*/

<?php

require_once 'core/settings.php';

$plainpassword =

$user = database::getInstance()->query("SELECT * FROM users WHERE username='' and password=''");

if(!$user->count()) {
    echo 'No such user';
}else {

    echo $user->first()->username;

}



class LoginAuthenticator {

}