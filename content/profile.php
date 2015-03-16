<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 14/12/2014
 * Time: 18:12
 */
session_start();
include 'database.php';
include '../functions/user.php';
include '../functions/interests.php';


if (!isset($_SESSION['uid'])) {
    header('location: login.php');
} else {
    $db = new Database();
    $pf = new profileFunctions($db);

    $interests = new interests($db);
}
?>

<!DOCTYPE html>

<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Recruitment Network</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    <link rel="stylesheet" href="../css/icons/foundation-icons.css"/>


    <!-- If you are using the CSS version, only link these 2 files, you may add app.css to use for your overrides if you like -->
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/foundation.css">


    <script src="../js/vendor/modernizr.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>


</head>
<body>

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
            <li><a href="#">Left Nav Button</a></li>
        </ul>
        <ul class="right">
            <li><a href="logout.php"><i class="fi-unlock"></i></a></li>
        </ul>
    </section>

</nav>


</br>
<!--http://www.w3schools.com/bootstrap/bootstrap_grid_examples.asp-->


<div class="left row medium-12 columns">
    <div class="panel radius" style="background-color:#b0c4de">


        <label>Age: <?php echo $pf->getAge(); ?></label>

        <label>Date of Birth: <?php echo $pf->getDateOfBirth(); ?></label>


    </div>
</div>


<div class="left row medium-12 columns">


    <form action="../functions/updateInterests.php" method="post" name="interestsForm"
          id="interestsForm">

        <?php
        $result        = '';
        $currDepth     = 0;
        $end = count($list) - 1;

        $interestList = $interests->getInterestsWithFlags(1);

        foreach ($interestList as $index => $currNode) {

            if ($currNode['depth'] > $currDepth || $index == 0) {
                echo '<ul>';
            }elseif ($currNode['depth'] < $currDepth) {
                echo '</ul>';
            }

            if($currNode['isUserInterest'])
            {
                echo '<input type="checkbox" checked>';
            }elseif($interestList[$index + 1]['depth'] > $currNode['depth']){
                echo '<input type="checkbox">';
            }

            echo $currNode['interest'] . '</br>';

            $currDepth = $currNode['depth'];

            if ($index == $end) {
                echo '</ul>';
            }
        }


        ?>


</div>

<div class="left row medium-12 columns">
    <input name="submit" id="submitButton" type="submit" value="Update Interests"
           class="button">
</div>

</form>
<!-- </form> -->


<script src="../js/vendor/jquery.js"></script>
<script src="../js/foundation.min.js"></script>
<script>
    $(document).foundation();
</script>
</body>
</html>
