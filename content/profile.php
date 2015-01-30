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
$database = database::getInstance();

function isParent($root, $db)
{
    $vIsParent = $db->query("SELECT * FROM interests WHERE parent=?", array($root));

    if($vIsParent->count() > 0) {
        return true;
    }else{
        return false;
    }
}

function getChildren($root, $db)
{
    $vChildTopics = $db->query("SELECT * FROM interests WHERE parent=?", array($root));

    foreach($vChildTopics->results() as $topic) {

        echo '<li>' . $topic->interest . '</li>';

        if(isParent($topic->interest_id,$db)){
            echo '<ul>';
            getChildren($topic->interest_id,$db);
            echo '</ul>';
        }

    }
}

echo '<ul>';
getChildren(0,$database);
echo '</ul>';


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
