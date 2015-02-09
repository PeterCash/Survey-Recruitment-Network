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

</head>
<body>
<h1>Survey Distribution Network</h1>
<br/>
<br/>

<div name="loginForm" id="loginForm" class="login" >
    <form action="process.php" method="post">
        Username: <input name="username" id="username" type="text"  title="Username">
        <br/>
        Password: <input name="password" id="password" type="password" title="Password">
        <br/>
        <input name="submit" id="LoginSubmit" type="submit">
    </form>
</div>


<div id="ajaxStuff"></div>

</body>

