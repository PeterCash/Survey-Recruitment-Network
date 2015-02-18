<?php
require_once '../core/settings.php';

$db = database::getInstance();


$userId = $_SESSION['uid'];
$title = $_POST['title'];
$age  = $_POST['age'];
$county = $_POST['county'];

var_dump($_POST);


$db->query("INSERT INTO created_surveys(title, userId, age, county)
					VALUES (?,?,?,?)",
					array($title,$userId,$age,$county));

$SelectedInterests = $_POST['interests'];

var_dump($SelectedInterests);

/*foreach($SelectedInterests as $box) {
    $uid = $_SESSION['uid'];

    $FindInterestID = $db->query("SELECT * FROM interests
                                  WHERE interest_id=?",
                                  array($box));

    $insertid = $FindInterestID->first();


        echo $box;
    $AddUserInterests = $db->query("INSERT INTO user_interests(user_id,interest_id)
                        VALUES (?,?)",
                        array($uid, $insertid->interest_id));*/


?>