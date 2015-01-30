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

        echo '<input type="checkbox" name="interests[]" id="' . $topic->interest_id . '" value="' . $topic->interest . '">';
        echo $topic->interest;
        echo "</br>";

        if(isParent($topic->interest_id,$db)){
            echo '<ul>';
            getChildren($topic->interest_id,$db);
            echo '</ul>';
        }

    }
}


echo '<form action="updateinterests.php" method="post">';

getChildren(0,$database);
echo '<input name="submit" id="Interests" type="submit">';
echo '</form>';

?>


</body>
