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
    <script src="../scripts/login.js"></script>
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

    <div class="col-md-6">


        <form action="process.php" id="loginForm" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input name="username" id="username" type="text" class="form-control" title="Username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input name="password" id="password" type="password" class="form-control" title="Password">
            </div>
            <input name="submit" id="LoginSubmit" class="btn btn-default" type="submit">
            <div class="form-group">
                <br/>
                <div id="ajaxStuff"></div>
            </div>

        </form>


    </div>

    <div class="col-md-4"



    </div>

</div>

</body>
