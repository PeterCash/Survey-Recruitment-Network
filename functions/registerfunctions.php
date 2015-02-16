<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 14/12/2014
 * Time: 18:12
 */

require_once '../core/settings.php';

var_dump($_POST);

$db = database::getInstance();

$user = $_POST['username'];
$pass = $_POST['password'];
$passConf  = $_POST['passwordConfirm'];

$lower = strtolower($user);

$db->query("SELECT * FROM users WHERE lower(username)=?", array($lower));

if($db->count() > 0){
	echo "This user exists already. Go back and use a different username";
}else{	
	if($pass != $passConf){
		echo "The passwords you have entered don't seem to match. Go back and try again.";
	}else{
		$hash = password_hash($pass,PASSWORD_BCRYPT);
		$today = date("Y-m-d H:i:s");
		$group = 1;
		$db->query("INSERT INTO users (username, password, joined, group) VALUES (?,?,?,?)", array($user,$hash,$today,$group));
		echo "This account has been created.";
	}
}
?>
