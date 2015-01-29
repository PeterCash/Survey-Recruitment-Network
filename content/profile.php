<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 14/12/2014
 * Time: 18:12
 */
require_once '../core/settings.php';
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Survey Recruitment Network</title>
    <link rel="stylesheet" type="text/css" href="content/main.css">
</head>
<body>
<h1>Survey Distribution Network</h1>

<?php
$dbTopic = database::getInstance();

$ParentTopics = $dbTopic->query("SELECT * FROM interests JOIN interest_relationships ON interests.interest_id = interest_relationships.id WHERE interest_relationships.parent_id=?",array(0));


foreach($ParentTopics->results() as $topic){
    echo $topic->interest;
   echo "<br/>";
}

echo "<br>";

$ChildTopics = $dbTopic->query("SELECT * FROM interests JOIN interest_relationships ON interests.interest_id = interest_relationships.id WHERE interest_relationships.parent_id=?",array(49));


foreach($ChildTopics->results() as $topic){
    echo $topic->interest;
    echo "<br/>";
}

/*echo '<form action="updateinterests.php" method="post">';
foreach($AllTopics->results() as $topic)
{
    $FindInterests = $dbTopic->query("SELECT * FROM interests INNER JOIN interest_relationships ON interests.interest_id = interest_relationships.id WHERE topic=?", array($topic->id));

    echo "<strong>$topic->topic</strong>";
    echo '<br/>';


    foreach($FindInterests->results() as $interest)
    {
        $currentInterest = $interest->interest;
        $currentInterestID = $interest->interest_id;
        echo "<input type=\"checkbox\" name=\"interestboxes[]\" id=\"$currentInterestID\" value=\"$currentInterest\">$currentInterest";
        echo '<br/>';

        if($interest == $FindInterests->last()){
            echo "END";
            echo '<br/>';
        }
    }

    echo '<br/>';
}
echo '<input name="submit" id="Interests" type="submit">';
echo '</form>';*/

?>


</body>
