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

$AllTopics = $dbTopic->query("SELECT * FROM topics");

echo '<form action="">';
foreach($AllTopics->results() as $topic)
{
    $FindInterests = $dbTopic->query("SELECT * FROM interests WHERE topic=?", array($topic->id));

    echo "<strong>$topic->topic</strong>";
    echo '<br/>';


    foreach($FindInterests->results() as $interest)
    {
        $currentInterest = $interest->interest;
        $currentInterestID = $interest->interest_id;
        echo "<input type=\"checkbox\" name=\"$currentInterest\" id=\"$currentInterestID\" value=\"$currentInterest\">$currentInterest";
        echo '<br/>';

        if($interest == $FindInterests->last()){
            echo "END";
            echo '<br/>';
        }
    }

    echo '<br/>';
}
echo '</form>';

?>


</body>
