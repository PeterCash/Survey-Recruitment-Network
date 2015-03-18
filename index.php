<?php
/**
 * Created by PhpStorm.
 * User: cashp
 * Date: 11/02/2015
 * Time: 15:21
 */
include 'content/database.php';
include 'functions/surveyCreatorFunction.php';
include 'functions/user.php';


error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['uid'])) {
    header('location: content/login.php');
}


$db = new Database();


?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Recruitment Network</title>
    <link rel="stylesheet" href="css/icons/foundation-icons.css"/>

    <!-- If you are using the CSS version, only link these 2 files, you may add app.css to use for your overrides if you like -->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" type="text/css" href="content/main.css">


    <script src="js/vendor/modernizr.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>


</head>

<nav class="top-bar" data-topbar role="navigation">
    <ul class="title-area">
        <li class="name">
            <h1><a href="#">My Site</a></h1>
        </li>
        <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
    </ul>

    <section class="top-bar-section">
        <!-- Right Nav Section -->
        <ul class="left">
            <li><a href="#">Home</a></li>
        </ul>
        <ul class="left">
            <li><a href="content/newsurvey.php">Create A Survey</a></li>
        </ul>
        <ul class="left">
            <li><a href="content/profile.php">Profile</a></li>
        </ul>
        <ul class="right">
            <li><a href="content/logout.php"><i class="fi-unlock"></i></a></li>
        </ul>

</nav>

</br>


<ul class="tabs" data-tab>
    <li class="tab-title"><a href="#interests">Interesting Surveys</a></li>
    <li class="tab-title"><a href="#demo">For your demographic</a></li>
    <li class="tab-title"><a href="#others">Try something new</a></li>
</ul>


<div class="tabs-content">
    <div class="content active" id="interests">

       <?php
        $db->query("SELECT * FROM survey
						INNER JOIN survey_interests
						ON survey.surveyId = survey_interests.surveyId
						INNER JOIN user_interests
						ON survey_interests.interestId = user_interests.interestId
						WHERE user_interests.userId = ?
						GROUP BY survey_interests.surveyId
						ORDER BY COUNT(*) DESC");
        $db->addParameter($_SESSION['uid']);
        $db->execute();


        if ($db->hasResults()) {

            foreach ($db->resultset() as $row) {

                echo '<div class="">';
                echo '<div class="medium-12 columns">';
                echo '<div class="panel raised nicepanel1">';
                echo '<p>' . $row['title'] . '</p>';

                echo '</div>';
                echo '</div>';
                echo '</div>';
            }

        } else {
            echo '<div class="left row">';
            echo '<div class="medium-12 columns">';
            echo '<div class="panel raised nicepanel1">';
            echo '<p>No surveys found</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }

        ?>


    </div>

    <div class="content" id="demo">


                <?php
                $county = '';
                $db->beginTransaction();
                $db->query("SELECT * FROM user_profiles
						WHERE userId = ?");
                $db->addParameter($_SESSION['uid']);

                $county = $db->single()['county'];

                $db->endTransaction();



                $db->beginTransaction();
                $db->query("SELECT * FROM survey
						WHERE county = ?");
                $db->addParameter($county);
                $db->execute();

                $county = 1;

                if ($db->hasResults()) {

                    foreach ($db->resultset() as $row) {

                        echo '<div class="left row">';
                        echo '<div class="medium-12 columns">';
                        echo '<div class="panel raised nicepanel1">';
                        echo '<p>' . $row['title'] . '</p>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }

                } else {
                    echo '<div class="">';
                    echo '<div class="medium-12 columns">';
                    echo '<div class="panel raised nicepanel1">';
                    echo '<p>No surveys found</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }

                $db->endTransaction();

                ?>


    </div>

    <div class="content" id="others">

        <div class="left row">
            <div class="medium-10 columns">
                <p>Try something new</p>
            </div>
        </div>

    </div>


</div>


<div class="row footer">

</div>


<script src="js/vendor/jquery.js"></script>
<script src="js/foundation.min.js"></script>
<script>
    $(document).foundation();
</script>
</body>
</html>