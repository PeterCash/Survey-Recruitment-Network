<?php
/**
 * Created by PhpStorm.
 * User: cashp
 * Date: 11/02/2015
 * Time: 15:21
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
        <div class="panel panel-primary">
            <div class="panel-heading">Who are you targeting?</div>
            <div class="panel-body">

                <form action="../functions/surveyCreatorFunction.php" id="surveyForm" method="post" class="">

                    <div class="form-group col-md-12">
                        <label for="title">Title</label><br/>
                        <input name="title" class="form-control" type="text">
                    </div>

                    <br/>


                    <div class="form-group col-md-2">
                        <label for="title">Target Age</label><br/>
                        <input name="age" class="form-control" type="number">
                    </div>

                    <br/>

                    <div class="form-group col-md-12">
                        <button id="surveySubmit" class="btn btn-default" type="submit">Create This Survey</button>
<!--                        <img id="preloader" src="../images/loading.gif" style="padding-left: 10px;">-->
                        <br/>
                    </div>

                </form>


            </div>


        </div>
    </div>
</div>


<div class="col-md-4">


</div>

</div>

</body>

