<?php
/**
* Created by PhpStorm.
* User: Peter
* Date: 14/12/2014
* Time: 17:50
*/

require_once '../core/settings.php';

$username = $_POST['username'];
$password = $_POST['password'];
$encryptedpassword = $password;

//Password will be encrypted

$user = database::getInstance()->query("SELECT * FROM users WHERE username=? and password=?", array($username ,$encryptedpassword));

if(!$user->count()) {
    echo "User credentials are invalid";
}else {
    $_SESSION['username'] = $user->first()->username;
    $_SESSION['uid'] = $user->first()->id;
   //header("Location: profile.php");
}





