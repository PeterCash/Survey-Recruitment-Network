<?php
include '../content/database.php';
session_start();

$db = new database();


$userId = $_SESSION['uid'];
$title = $_POST['title'];
$age  = $_POST['age'];
$county = $_POST['county'];
$SelectedInterests = $_POST['interests'];


$cs = new createSurvey($db);

$cs->addSurvey($userId, $title, $age, $county);
$cs->addInterests($SurveyID, $SelectedInterests);

class createSurvey{

	private $db;
	private $SurveyID;

	public function __construct($database)
	{
		$this->db = $database;
	}


////////////////////////////////////////////////////////////////////////////////////

	public function addSurvey($userId, $title, $age, $county){


		$this->db->beginTransaction();
		$this->db->query("INSERT INTO survey(userId, title, age, county)
			VALUES (?,?,?,?)");
		$this->db->addParameter($userId);
		$this->db->addParameter($title);
		$this->db->addParameter($age);
		$this->db->addParameter($county);

		$this->$SurveyID = $this->db->lastId();
		$this->db->endTransaction();
	}
////////////////////////////////////////////////////////////////////////////////////

	public function addInterests($SurveyID, $SelectedInterests){

		


		foreach($SelectedInterests as $InterestID) {
			$uid = $_SESSION['uid'];

			$this->db->beginTransaction();

			$AddSurveyInterests = $this->db->query("INSERT INTO survey_interests(surveyId,interestId)
				VALUES (?,?)");
			$this->db->addParameter($SurveyID);
			$this->db->addParameter($InterestID);

			$this->db->endTransaction();
		}
	}

////////////////////////////////////////////////////////////////////////////////////

	public function addQuestions($QuestionAnswerArray, $SurveyID){

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

	}
}
	?>