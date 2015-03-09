<?php
/**
 * Created by PhpStorm.
 * User: cashp
 * Date: 12/02/2015
 * Time: 12:51
 */
//http://stackoverflow.com/questions/12556805/how-to-grab-data-from-post-to-a-class

session_start();

class surveyRetrieverFunctions
{

    private $db;


    public function __construct($database)
    {
        $this->db = $database;
    }

    public function checkSurveyExists($surveyId)
    {
        $this->db->query("SELECT surveyId FROM survey WHERE surveyId = ?");
        $this->db->addParameter($surveyId);
        $this->db->execute();

        return $this->db->hasResults() ? true : false;
    }

    public function getSurveyQuestions($surveyId)
    {
        $this->db->query("SELECT * FROM survey
                          INNER JOIN survey_questions
                          ON survey_questions.surveyId = survey.surveyId
                          WHERE survey.surveyId = ?");
        $this->db->addParameter($surveyId);
        $this->db->execute();


        $this->showSurveyQuestions($surveyId, $this->db->resultset());
    }

    public function showSurveyQuestions($surveyID, $resultSet)
    {
       foreach($resultSet as $question) {
           echo '<div class="panel">';
           echo $question['questionText'];
           echo '<br/>';

           $answers = $this->getSurveyAnswers($question['questionId']);

           foreach ($answers as $answer)
           {
               echo $answer['answerText'];
               echo '<br/>';
           }

           echo '</div>';
       }
    }

    public function getSurveyAnswers($questionID)
    {
        $this->db->query("SELECT * FROM survey_answers
                          WHERE questionId = ?");
        $this->db->addParameter($questionID);
        $this->db->execute();

        return $this->db->resultset();
    }


}

?>
