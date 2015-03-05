<?php
include '../content/database.php';
session_start();

$db = new Database();
$QuestionsArray = [];
$AnswersArray = [];

$userId = $_SESSION['uid'];
$title = $_POST['title'];
$age  = $_POST['age'];
$county = $_POST['county'];

if(isset($_POST['interests'])){
	$SelectedInterests = $_POST['interests'];
}

$questionID = 1;
$answerID = 1;


while (isset($_POST['answers' . $answerID])) {
	$answers = $_POST['answers' . $answerID];
	foreach($answers as $answers => answer){
		$AnswersArray[] = $answer;
	}
	$answerID+=1;
}

	$questions = $_POST['questions'];
	foreach($questions as $question){
		$QuestionsArray[] = $question;
	}
	$questionID+=1;
}




$cs = new createSurvey($db);

$cs->addSurvey($userId, $title, $age, $county);
$cs->addInterests($SelectedInterests);
$cs->addQuestionsAndAnswers(NULL, $AnswersArray);

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

	public function addQuestionsAndAnswers($QuestionArray, $AnswerArray){

		$currentQuestion;
		$currentAnswer;

		foreach ($AnswerArray as $key) {
			if(is_array($key)){
				var_dump($key);
			}
		}

////////////////////////////////////////////////////////////////////////////////////

	}
}
?>