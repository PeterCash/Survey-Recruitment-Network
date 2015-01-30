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

        if(isParent($topic->interest_id,$db)==false){
            if(userInterest($topic->interest_id,$db)==true) {
                echo '<input type="checkbox" name="interests[]" id="' . $topic->interest_id . '" value="' . $topic->interest . '" checked>';
            }else{
                echo '<input type="checkbox" name="interests[]" id="' . $topic->interest_id . '" value="' . $topic->interest . '">';
            }

        }

        echo $topic->interest;
        echo "</br>";

        if(isParent($topic->interest_id,$db)){
            echo '<ul>';
            getChildren($topic->interest_id,$db);
            echo '</ul>';
        }

    }
}


function userInterest($interestID, $db)
{
    $uid = $_SESSION['uid'];
    $vUserInterests = $db->query("SELECT * FROM userinterests WHERE user_id=? AND interest_id=?", array($uid, $interestID));

    if($vUserInterests->count() < 1) {
        return false;
    }else{
        return true;
    }
}


echo '<form action="updateinterests.php" method="post">';

getChildren(0,$database);
echo '<input name="submit" id="Interests" type="submit">';
echo '</form>';


?>


</body>
