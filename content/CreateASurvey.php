<?php
/**
 * Created by PhpStorm.
 * User: cashp
 * Date: 11/02/2015
 * Time: 15:21
 */
include '../core/settings.php';
include '../functions/surveyCreatorFunction.php';
include 'profilefunctions.php';

$db = Database::getInstance();
$allCounties = getCounties($db);
$user = getUser($_SESSION['uid'], Database::getInstance());

?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Survey Recruitment Network</title>
    <link rel="stylesheet" type="text/css" href="main.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

<div class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Welcome</a>

        </div>
        <ul class="nav navbar-nav navbar-right">

        </ul>
    </div>
</div>

<div class="container-fluid">

    <div class="col-md-9 col-md-offset-1">


        <div role="tabpanel">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#demo" aria-controls="home" role="tab"
                                                          data-toggle="tab">Demographic</a></li>
                <li role="presentation"><a href="#interests" aria-controls="profile" role="tab" data-toggle="tab">Interests</a>
                </li>

            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="demo">


                    <div class="panel panel-primary">
                        <div class="panel-heading">Who are you targeting?</div>
                        <div class="panel-body">


                            <form action="../functions/surveyCreatorFunction.php" id="surveyForm" method="post"
                                  class="">

                                <div class="form-group col-sm-4">
                                    <label for="author">Author Name</label><br/>
                                    <input name="author" class="form-control" type="text" disabled="disabled"
                                           value="<?php echo $user->firstName . " " . $user->lastName ?>">
                                </div>

                                <div class="form-group col-sm-4">
                                    <label for="user">User Name</label><br/>
                                    <input name="user" class="form-control" type="text" disabled="disabled"
                                           value="<?php echo $user->username ?>">
                                </div>

                                <div class="form-group col-sm-12">
                                    <hr>
                                </div>

                                <div class="form-group col-sm-12">
                                    <label for="title">Title</label><br/>
                                    <input name="title" class="form-control" type="text">
                                </div>


                                <div class="form-group col-sm-2">
                                    <label for="title">Target Age</label><br/>
                                    <input name="age" class="form-control" type="number">
                                </div>

                                <div class="col-sm-11"></div>

                                <div class="form-group col-sm-4">
                                    <label for="county">County</label><br/>
                                    <select name="county" class="form-control" type="text">
                                        <option selected="selected" disabled="disabled"></option>
                                        <?php
                                        foreach ($allCounties as $c) {
                                            echo '<option value="' . $c->id . '">' . $c->county . '</option>';
                                        }
                                        ?>
                                    </select>


                                </div>


                                </br>

                                <div class="form-group col-sm-12">
                                    <button id="surveySubmit" class="btn btn-default" type="submit">Create This Survey
                                    </button>
                                    <!--                        <img id="preloader" src="../images/loading.gif" style="padding-left: 10px;">-->
                                    <br/>
                                </div>

                            </form>


                        </div>


                    </div>
                </div>

                <div role="tabpanel" class="tab-pane" id="interests">

                </div>
            </div>

        </div>


        <div class="col-md-4">


        </div>

    </div>

</body>

