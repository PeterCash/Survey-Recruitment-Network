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


$AnswersArray[] = $_POST['answers'];



$QuestionsArray = $_POST['questions'];




$cs = new createSurvey($db);

$cs->addSurvey($userId, $title, $age, $county);
$cs->addInterests($SelectedInterests);
$cs->addQuestionsAndAnswers($QuestionsArray, $AnswersArray);


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

			

			$this->db->query("INSERT INTO survey_interests(surveyId,interestId)
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

		foreach ($QuestionArray as $key) {
			//var_dump($key);
		}

		foreach ($AnswerArray as $key) {
			//var_dump($key);
		}

		$this->db->beginTransaction();
		$questionPos = 1;
		foreach($QuestionArray as $q){
			$this->db->query("INSERT INTO survey_questions(surveyId, questionPosition, questionText)
				VALUES(?,?,?)");
			$this->db->addParameter($this->surveyId);
			$this->db->addParameter($questionPos);
			$this->db->addParameter($q);
			$this->db->execute();

			$answer = $this->db->lastInsertId();	
			$answerPos = 1;
			foreach($AnswerArray[$questionPos-1] as $a => $ans){
                var_dump($a);
				$this->db->query("INSERT INTO survey_answers(surveyId, questionID, answerPosition, answerText)
					VALUES(?,?,?,?)");
				$this->db->addParameter($this->surveyId);
				$this->db->addParameter($answer);
				$this->db->addParameter($answerPos);
				$this->db->addParameter($a[$answerPos]);
				$this->db->execute();
                var_dump($a[$answerPos]);
				$answerPos+=1;

			}

			$questionPos+=1;
		}
		$this->db->endTransaction();




////////////////////////////////////////////////////////////////////////////////////

	}
}
?>