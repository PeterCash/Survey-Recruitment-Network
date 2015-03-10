<?php
/**
 * Created by PhpStorm.
 * User: cashp
 * Date: 11/02/2015
 * Time: 15:21
 */
include '../content/database.php';
include '../functions/surveyCreatorFunction.php';
include 'profilefunctions.php';

if (!isset($_SESSION['uid'])) {
    header('location: login.php');
} else {
    $db = new database();
    $pf = new profileFunctions($db);
    $scf = new surveyCreatorFunctions($db);
}

$allCounties = $scf->getCounties();
$user = $pf->getUser();

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
    <link rel="stylesheet" type="text/css" href="main.css">


    <script src="../js/vendor/modernizr.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>
    <script src="../js/surveyCreator.js" language="JavaScript" type="text/javascript"></script>

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
            <li><a href="#">Left Nav Button</a></li>
        </ul>
        <ul class="right">
            <li><a href="logout.php"><i class="fi-unlock"></i></a></li>
        </ul>

</nav>

</br>

<ul class="tabs" data-tab>
    <li class="tab-title active"><a href="#survey">Survey</a></li>
    <li class="tab-title"><a href="#demo">Demographic</a></li>
    <li class="tab-title"><a href="#interests">Interests</a></li>
</ul>


<div class="tabs-content">
    <div class="content active" id="survey">

        <div class="medium-10 columns">

            <div class="left row">
                <div class="medium-12 columns">
                    <button class="button" id="createQuestion">Create a new question</button>
                </div>
            </div>

            <br/><br/><br/>

            <form action="../functions/addsurvey.php" id="surveyDetails" method="post" novalidate>

                <div id="questionBlock" class="">


                </div>
        </div>


    </div>

    <div class="content" id="demo">
        <div class="medium-12 columns">


            <div class="left row">
                <div class="medium-6 columns">
                    <label for="author">Author Name</label><br/>
                    <input name="author" type="text" disabled="disabled"
                           value="<?php echo $user['firstName'] . " " . $user['lastName']; ?>">
                </div>
                <!-- 	</div>

                <div class="left row"> -->
                <div class="medium-6 columns">
                    <label for="user">User Name</label><br/>
                    <input name="user" type="text" disabled="disabled" value="<?php echo $user['email'] ?>">
                </div>
            </div>

            <hr>

            <div class="left row">
                <div class="medium-8 columns">
                    <label for="title">Title</label><br/>
                    <input name="title" type="text" required>
                </div>
            </div>

            <div class="left row">
                <div class="medium-8 columns">
                    <label for="title">Target Age</label><br/>

                    <div class="row">
                        <div class="small-10 medium-11 columns">
                            <div id="sliderAge" class="range-slider round" data-slider
                                 data-options="display_selector: #age; start: 18; end: 100;">
                                <span class="range-slider-handle" role="slider" tabindex="0"></span>
                                <span class="range-slider-active-segment"></span>
                                <span id="age" class="row"></span>
                                <input name="age" id="age" type="hidden">
                            </div>
                        </div>

                    </div>

                    <br/>
                    <br/>
                </div>
            </div>

            <div class="left row">
                <div class="medium-6 columns">
                    <label for="county">County</label><br/>
                    <select name="county" class="form-control" type="text">
                        <option selected="selected" disabled="disabled"></option>
                        <?php
                        foreach ($allCounties as $c) {
                            echo "<option value=" . $c['id'] . '">' . $c['county'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <br/>
            <br/>
        </div>


    </div>

    <div class="content" id="interests">

        <div class="left row">
            <div class="medium-10 columns">
                <?php
                $scf->getChildren2(0);
                ?>

            </div>
        </div>

    </div>

</div>

</div>



</div>

</div>

<div class="row footer">
    <input id="surveySubmit" class="button full-width" type="submit" value="Create This Survey"/>
    <!-- <img id="preloader" src="../images/loading.gif" style="padding-left: 10px;">-->
</div>

</form>


<script src="../js/vendor/jquery.js"></script>
<script src="../js/foundation.min.js"></script>
<script>
    $(document).foundation();

    var newVal = 18;
    $('#sliderAge').foundation('slider', 'set_value', newVal);

    $('#sliderAge').on('change.fndtn.slider', function () {
        var sv = $('#age').attr('data-slider');
        // document.title = sv;
    });

</script>
</body>
</html>