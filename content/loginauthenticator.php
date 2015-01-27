/**
* Created by PhpStorm.
* User: Peter
* Date: 14/12/2014
* Time: 17:50
*/

<?php

require_once '../core/settings.php';

//$username = $_POST['username'];
$username = "test";
$plainpassword = "pass";
$encryptedpassword = "";

echo $username;
echo $plainpassword;

echo "<br/>";
echo 'mysql:host=' . getsettings::getvalue('mysql/host') . ';dbname=' . getsettings::getvalue('mysql/db'), getsettings::getvalue('mysql/username'), getsettings::getvalue('mysql/password');
echo "<br/>";

$user = database::getInstance()->query("SELECT * FROM users WHERE username=? and password=?", array($username ,$plainpassword));

if(!$user->count()) {
    echo 'No such user';
}else {

    echo $user->first()->username;

}



