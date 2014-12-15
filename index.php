<?php
require_once 'core/settings.php';

/*<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Survey Recruitment Network</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
<h1>Survey Distribution Network</h1>
<br/>
<br/>

<div id="login" class="login" >
    <form action="">
        <input name="username" id="username" type="text"  title="Username">
        <br/>
        <input name="password" id="password" type="password" title="Password">
        <br/>
        <input name="submit" id="LoginSubmit" type="submit">
    </form>
</div>*/
$user = database::getInstance()->query("SELECT username FROM users WHERE username = ?", array('peter'));

if($user->error()) {
    echo 'No such user';
}else {
    echo 'OK';

    var_dump($user);
}



?>


