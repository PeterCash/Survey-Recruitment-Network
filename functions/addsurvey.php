<?php
include '../content/database.php';
session_start();

$db = new Database();

$userId = $_SESSION['uid'];
$title = $_POST['title'];
$age  = $_POST['age'];
$county = $_POST['county'];

if(isset($_POST['interests'])){
	$SelectedInterests = $_POST['interests'];
}

foreach ($_POST as $key) {
	if(is_array($key)){
		var_dump($key);
	}
}

$cs = new createSurvey($db);

$cs->addSurvey($userId, $title, $age, $county);
$cs->addInterests($SelectedInterests);
//$cs->addQuestions();

class createSurvey{

	private $db;
	private $surveyId;

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
		$this->db->execute();


		$this->surveyId = $this->db->lastInsertId();

		$this->db->endTransaction();

	}
////////////////////////////////////////////////////////////////////////////////////

	public function addInterests($SelectedInterests){
		$this->db->beginTransaction();
		foreach($SelectedInterests as $interest) {

			

			$AddSurveyInterests = $this->db->query("INSERT INTO survey_interests(surveyId,interestId)
				VALUES (?,?)");
			$this->db->addParameter($this->surveyId);
			$this->db->addParameter($interest);
			$this->db->execute();

			
		}
		$this->db->endTransaction();
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