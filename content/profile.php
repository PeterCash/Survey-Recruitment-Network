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
    <link rel="stylesheet" type="text/css" href="main.css">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>
    <script src="../scripts/updateinterests.js"></script>


</head>
<body>
<h1>Profile</h1>

<?php
$database = database::getInstance();
$db = $database;

$profile = new profilefunctions($db);
echo $profile->getAge($_SESSION['uid']);


?>



<div class="profileSection">
    <form action="updateinterests.php" method="post" name = "interestsForm" id="interestsForm">

        <?php


        $allInterests = $db->query("SELECT * FROM interests", array());
        //$userTopics = $db->query("SELECT * FROM interests INNER JOIN userinterests ON interests.interest_id = userinterests.interest_id", array());


        $profile->getChildren($allInterests->results(),0);



        ?>

        <input name="submit" id="submitButton" type="submit" value="Update Interests">
    </form>



    <div id="ajaxStuff">Hello</div>


</body>
