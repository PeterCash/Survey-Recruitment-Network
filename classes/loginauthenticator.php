<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 14/12/2014
 * Time: 17:50
 */


require_once '../core/settings.php';

class loginAuthenticator
{
    protected $username;
    protected $password;
    protected $db;

    public function __construct($inputUsername,$inputPassword, $database)
    {
        $this->db = $database;
        $this->username = $inputUsername;
        $this->password = $inputPassword;
    }

    function checkCredentials()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = database::getInstance()->query("SELECT * FROM users WHERE username=?", array($username));


        if ($user->count()) {
            $hash = $user->first()->password;

            if ($this->checkPassword($password, $hash) == true) {
                $_SESSION['username'] = $user->first()->username;
                $_SESSION['uid'] = $user->first()->id;
                return true;
            }
        }

        return false;
    }


    private function checkPassword($password, $hash)
    {
        if (password_verify($password, $hash)) {
            return true;
        } else {
            return false;
        }
    }
}






