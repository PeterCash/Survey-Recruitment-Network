<?php
include '../content/database.php';
session_start();

$db = new database();


$userId = $_SESSION['uid'];
$title = $_POST['title'];
$age  = $_POST['age'];
$county = $_POST['county'];


////////////////////////////////////////////////////////////////////////////////////

//addSurvey

$db->beginTransaction();
$db->query("INSERT INTO survey(userId, title, age, county)
					VALUES (?,?,?,?)");
$db->addParameter($userId);
$db->addParameter($title);
$db->addParameter($age);
$db->addParameter($county);

$SurveyID = $db->lastId();
$db->endTransaction();

////////////////////////////////////////////////////////////////////////////////////

//addInterests

$SelectedInterests = $_POST['interests'];


foreach($SelectedInterests as $box) {
    $uid = $_SESSION['uid'];

    $db->beginTransaction();

    $AddSurveyInterests = $db->query("INSERT INTO survey_interests(surveyId,interestId)
                        VALUES (?,?)");
    $db->addParameter($SurveyID);
    $db->addParameter($box);

    $db->endTransaction();
}

////////////////////////////////////////////////////////////////////////////////////

//addQuestions

// foreach($_POST as $question => $answers) {
	
// 	echo $question;

// 	echo '<br/>';

// 	foreach($answers as $ans)
// 	{
// 		echo $ans;
// 		echo '<br/>';
// 	}
// }

////////////////////////////////////////////////////////////////////////////////////


?>