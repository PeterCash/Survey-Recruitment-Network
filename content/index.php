<?php
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

    <div class="col-md-6 col-md-offset-3">

        <div class="form-group">
            <form action="../functions/loginauthenticator.php" id="loginForm" method="post">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">Username</span>
                    <input name="username" type="text" class="form-control" title="username"
                           aria-describedby="basic-addon1">
                </div>
                <br/>

                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">Password </span>
                    <input name="password" type="text" class="form-control" title="password"
                           aria-describedby="basic-addon1">
                </div>
                <br/>

                <div class="input-group">
                    <button id="LoginSubmit" class="btn btn-default" type="submit">Login</button>
                    <img id="preloader" src="../images/loading.gif" style="padding-left: 10px;">
                    <br/>
                </div>


            </form>

        </div>

        <hr>


        <label id="ajaxStuff" class="label label-danger">
            <span id="ajaxStuff" class="glyphicon glyphicon-remove"></span>
                Credentials Invalid
        </label>




    </div>

    <div class="col-md-4">


    </div>

</div>

</body>

