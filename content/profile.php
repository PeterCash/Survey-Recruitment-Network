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
<h1>Profile</h1>

<?php
$database = database::getInstance();
$db=$database;

$profile = new profilefunctions($db);
echo $profile->getAge(1);

function isParent($root, $db)
{
    $vIsParent = $db->query("SELECT * FROM interests WHERE parent=?", array($root));

    if ($vIsParent->count() > 0) {
        return true;
    } else {
        return false;
    }
}

function getChildren($root, $db)
{
    echo "<em> Function Called</em> </br>";

    $vChildTopics = $db->query("SELECT * FROM interests WHERE parent=?", array($root));

    foreach ($vChildTopics->results() as $topic) {

        /*All this ford is echo checkboxes according to whether they relate to a topic a user has selected.
         What this means is that a checked box is a selected option and an unchecked box is not selected.
         */

        if (!isParent($topic->interest_id, $db)) {
            if (userInterest($topic->interest_id, $db) == true) {
                echo '<input type="checkbox" name="interests[]" id="' . $topic->interest_id . '" value="' . $topic->interest . '" checked>';
            } else {
                echo '<input type="checkbox" name="interests[]" id="' . $topic->interest_id . '" value="' . $topic->interest . '">';
            }

        }

        /*This echos out the interest name only. If a topic is a parent then the topic itself cannot be
        selected itself only it's children can be selected.
        */
        echo $topic->interest;
        echo "</br>";

        /*
* If a topic has a non-zero number of children then the function will call itself using the
* interest as it's root. This means that the function can keep running inside itself until all
* interests are returned.
* */

        if (isParent($topic->interest_id, $db)) {
            echo '<ul>';
            getChildren($topic->interest_id, $db);
            echo '</ul>';
        }


    }
}


function userInterest($interestID, $db)
{
    $uid = $_SESSION['uid'];
    $vUserInterests = $db->query("SELECT * FROM userinterests WHERE user_id=? AND interest_id=?", array($uid, $interestID));

    if ($vUserInterests->count() < 1) {
        return false;
    } else {
        return true;
    }
}


echo '<form action="updateinterests.php" method="post">';

getChildren(0, $database);
echo '<input name="submit" id="Interests" type="submit">';
echo '</form>';


?>


</body>
