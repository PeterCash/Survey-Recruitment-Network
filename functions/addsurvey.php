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

$SurveyID = $db->lastID();

$SelectedInterests = $_POST['interests'];


foreach($SelectedInterests as $box) {
    $uid = $_SESSION['uid'];

    $AddUserInterests = $db->query("INSERT INTO survey_interests(survey_id,interest_id)
                        VALUES (?,?)",
                        array($SurveyID, $box));
}

?>