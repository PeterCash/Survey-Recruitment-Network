<?php
/**
 * Created by PhpStorm.
 * User: cashp
 * Date: 11/02/2015
 * Time: 15:21
 */
include 'database.php';
include '../functions/surveyCreatorFunction.php';
include '../functions/user.php';
include '../functions/interests.php';

$db = new Database;
?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Recruitment Network</title>
    <link rel="stylesheet" href="../css/icons/foundation-icons.css"/>

    <!-- If you are using the CSS version, only link these 2 files, you may add app.css to use for your overrides if you like -->
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/foundation.css">
    <link rel="stylesheet" type="text/css" href="../content/main.css">


    <script src="../js/vendor/modernizr.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>

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
            <li><a href="#">Home</a></li>
        </ul>
        <ul class="right">
            <li><a href="../content/logout.php"><i class="fi-unlock"></i></a></li>
        </ul>

</nav>

</br>

<h1>Interests Test Page</h1>


<?php


$ints = new interests($db);
$list = $ints->getFullTree();
$depth = 0;


$result        = '';
$currDepth     = 0;
$end = count($list) - 1;
// Start the loop
foreach ($list as $index => $currNode) {

    if ($currNode['depth'] > $currDepth || $index == 0) {
        echo '<ul>';
    }elseif ($currNode['depth'] < $currDepth) {
        echo '</ul>';
    }

    echo '<li>' . $currNode['interest'] . '</li>';

    $currDepth = $currNode['depth'];

    if ($index == $end) {
        echo '</ul>';
    }
}

$sibs = $ints->getInterestsWithFlags(2);

var_dump($sibs);


//var_dump($list);
?>








<script src="../js/vendor/jquery.js"></script>
<script src="../js/foundation.min.js"></script>
<script>
    $(document).foundation();
</script>
</body>
</html>