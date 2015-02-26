<?php
require_once '../core/settings.php';

$db = database::getInstance();


$userId = $_SESSION['uid'];
$title = $_POST['title'];
$age  = $_POST['age'];
$county = $_POST['county'];

echo $userId;
echo $title;
echo $age;
echo $county;


$db->query("INSERT INTO survey(userId, title, age, county)
					VALUES (?,?,?,?)",
					array($userId,$title,$age,$county));

$SurveyID = $db->lastID();

$SelectedInterests = $_POST['interests'];


foreach($SelectedInterests as $box) {
    $uid = $_SESSION['uid'];

    $AddUserInterests = $db->query("INSERT INTO survey_interests(surveyId,interestId)
                        VALUES (?,?)",
                        array($SurveyID, $box));
}

foreach($_POST as $question => $answers) {
	
	echo $question;

	echo '<br/>';

	foreach($answers as $ans)
	{
		echo $ans;
		echo '<br/>';
	}
}


?>