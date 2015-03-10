<?php
include '../content/database.php';
/**
 * Created by PhpStorm.
 * User: cashp
 * Date: 10/03/2015
 * Time: 12:47
 */

$db = new Database();

$questions = $_POST['question'];
$survey = $_POST['survey'];
$user = $_POST['user'];

foreach($questions as $question => $answer)
{
    $db->query("INSERT INTO survey_responses(userId, surveyId, questionId, answerId) VALUES (?,?,?,?)");
    $db->addParameter($user);
    $db->addParameter($survey);
    $db->addParameter($question);
    $db->addParameter($answer);

    $db->execute();
}