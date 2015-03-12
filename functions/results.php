<?php
/**
 * Created by PhpStorm.
 * User: cashp
 * Date: 12/03/2015
 * Time: 14:30
 */

class Results
{

    private $db;
    private $userID;

    public function __construct($database)
    {
        $this->db = $database;
        $this->userID = $_SESSION['uid'];
    }

    public function getMyCreatedSurveys(){
        $this->db->query("SELECT title,surveyId FROM survey WHERE userId = ?");

        $this->db->addParameter($this->userID);
        $this->db->execute();

        $results = NULL;
        if($this->db->hasResults()) {
            $results = $this->db->resultset();
        }

          return $results;

    }

    public function getSurveyResults($surveyID)
    {
        $this->db->query("SELECT *FROM survey
                          RIGHT JOIN survey_questions ON survey_questions.surveyId = survey.surveyId
                          RIGHT JOIN survey_answers ON survey_answers.surveyId = survey.surveyId
                          RIGHT JOIN survey_responses ON survey_responses.surveyId = survey.surveyId
                          WHERE survey.surveyId = ?");

        $this->db->addParameter($surveyID);
        $this->db->execute();
    }


}