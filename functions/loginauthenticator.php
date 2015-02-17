<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 14/12/2014
 * Time: 17:50
 */


require_once '../core/settings.php';

$db = database::getInstance();

$username = $_POST['username'];
$password = $_POST['password'];

$user = $db->query("SELECT * FROM users
                    WHERE username=?",
                    array($username));


if ($user->count()) {
    $hash = $user->first()->password;

    if (checkPassword($password, $hash) == true) {
        $_SESSION['username'] = $user->first()->username;
        $_SESSION['uid'] = $user->first()->userId;
        header("Location: ../content/profile.php");
    }
} else {
    
   header("Location: ../content/index.php");
}

function checkPassword($password, $hash)
{
    if (password_verify($password, $hash)) {
        return true;
    } else {
     header("Location: ../content/index.php");

    }
}

?>






