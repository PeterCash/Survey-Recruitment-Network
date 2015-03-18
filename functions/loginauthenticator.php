<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 14/12/2014
 * Time: 17:50
 */

session_start();
include '../content/database.php';

$db = new Database();

$username = $_POST['username'];
$password = $_POST['password'];

$db->query("SELECT * FROM users
                    WHERE email=?");
$db->addParameter($username);




if ($db->hasResults()) {
    $hash = $db->single()['password'];

    if (checkPassword($password, $hash) == true) {
        $_SESSION['email'] = $db->single()['email'];
        $_SESSION['uid'] = $db->single()['userId'];
        echo "Your logged in. Navigate to http://www.slampunk.co.uk/index.php";
    }
} else {
    
   header("Location: ../content/login.php");
}

function checkPassword($password, $hash)
{
    if (password_verify($password, $hash)) {
       return true;
    } else {
     header("Location: ../content/login.php");

    }
}

?>






