<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 14/12/2014
 * Time: 18:12
 */
require_once '../core/settings.php';
require_once 'Template1.php';

if (!isset($_SESSION['uid'])) {
    header('location: index.php');
}
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Survey Recruitment Network</title>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">


</head>
<body>


<div class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Profile</a>

        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
    </div>
</div>

<div class="container">
    <div class="col-med-6">
        <div class="row"></div>
        <div class="panel panel-primary">
            <div class="panel-heading">Personal Details</div>
            <div class="panel-body">

                <?php
                $database = database::getInstance();
                $db = $database;
                $profile = new profilefunctions($db);

                echo '<label class="label label-default">Age: ' . $profile->getAge($_SESSION['uid']) . '</label>';
                echo '</br><br/>';
                echo '<label class="label label-default">Date of Birth: ' . $profile->getDateOfBirth($_SESSION['uid']) . '</label>';


                ?>
            </div>
        </div>


        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">Interests</div>
                <div class="panel-body">
                    <form action="updateinterests.php" method="post" name="interestsForm" id="interestsForm">

                        <?php


                        //$allInterests = $db->query("SELECT * FROM interests", array());
                        $userTopics = $db->query("SELECT * FROM interests", array());


                        $profile->getChildren($userTopics->results(), 0, $database);





                        ?>


                        </br>
                        <input name="submit" id="submitButton" type="submit" value="Update Interests"
                               class="btn btn-default">
                    </form>


                    <div id="ajaxStuff"></div>
                </div>
            </div>
        </div>
    </div>

</body>
