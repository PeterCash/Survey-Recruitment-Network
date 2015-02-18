<?php
require_once '../core/settings.php';
?>

<!DOCTYPE html>
<html  class="no-js" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Recruitment Network</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    <link rel="stylesheet" href="../css/icons/foundation-icons.css" />

    <!-- If you are using the CSS version, only link these 2 files, you may add app.css to use for your overrides if you like -->
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/foundation.css">


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
                <li><a href="#">Left Nav Button</a></li>
            </ul>
            <ul class="right">
                <li><a href="logout.php"><i class="fi-unlock"></i></a></li>
            </ul>

        </nav>


    </br>

    <div class="medium-12 columns">
        <form action="../functions/loginauthenticator.php" id="loginForm" method="post" >


            <div class="">
                <div class="medium-10 columns medium-10-offset-1">
                    <label for="username">Username</label>
                    <input id="username" name="username" type="text" title="username">
                </div>
            </div>

            <div class="">
                <div class="medium-10 columns">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" title="password">
                </div>
            </div>

            <div class="">
                <div class="medium-10 columns">
                    <button id="LoginSubmit" class="button medium-8" type="submit">Login</button>
                </div>
            </div>

        </form>
    </div>




 <!--    <label id="ajaxStuff" class="">
        <span id="ajaxStuff"></span>
        Credentials Invalid
    </label> -->



    <script src="../js/vendor/jquery.js"></script>
    <script src="../js/foundation.min.js"></script>
    <script>
        $(document).foundation();

        
    </script>
</body>
</html>
