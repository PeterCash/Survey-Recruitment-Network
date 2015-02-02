<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Survey Recruitment Network</title>
    <link rel="stylesheet" type="text/css" href="content/main.css">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>
    <script src="scripts/login.js"></script>

</head>
<body>
<h1>Survey Distribution Network</h1>
<br/>
<br/>

<div name="login" id="login" class="login" >
    <form action="content/loginauthenticator.php" method="post">
        <input name="username" id="username" type="text"  title="Username">
        <br/>
        <input name="password" id="password" type="password" title="Password">
        <br/>
        <input name="submit" id="LoginSubmit" type="submit">
    </form>
</div>

<div id="ajaxStuff"></div>

</body>

