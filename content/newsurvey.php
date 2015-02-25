<?php
/**
 * Created by PhpStorm.
 * User: cashp
 * Date: 11/02/2015
 * Time: 15:21
 */
//include '../core/settings.php';
//include '../functions/surveyCreatorFunction.php';
//include 'profilefunctions.php';

//$db = Database::getInstance();
//$allCounties = getCounties($db);
//$user = getUser(1, Database::getInstance());

?>

<!DOCTYPE html>
<html  class="no-js" lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Survey Recruitment Network</title>
	<link rel="stylesheet" href="../css/icons/foundation-icons.css" />

	<!-- If you are using the CSS version, only link these 2 files, you may add app.css to use for your overrides if you like -->
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/foundation.css">
	<link rel="stylesheet" type="text/css" href="main.css">


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" language="JavaScript" type="text/javascript"></script>
	<script src="../js/vendor/modernizr.js" language="JavaScript" type="text/javascript"></script>

	<script src="http://malsup.github.com/jquery.form.js" language="JavaScript" type="text/javascript"></script>
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
			<li><a href="#">Home</a></li>
		</ul>
		<ul class="right">
			<li><a href="logout.php"><i class="fi-unlock"></i></a></li>
		</ul>

	</nav>

</br>





<ul class="tabs" data-tab>
	<li class="tab-title active"><a href="#t1">Tab1</a></li>
	<li class="tab-title"><a href="#t2">Tab2</a></li>
</ul>


<div class="tabs-content medium-12 columns">
	<div class="content active" id="t1">
		
		<div class="left row">
		<div class="medium-12 columns">
			<button class="button" id="createQuestion">Create a new question</button>
		</div>
		</div>

		<br/><br/><br/>

		<div id="questionBlock" class="">
		
		</div>








			




	</div>



	<div class="content" id="t2">
		<div class="">
			<a>tab 2</a>
		</div>


	</div>




</div>















<div class="row footer">
	
</div>




<script src="../js/vendor/jquery.js"></script>
<script src="../js/foundation.min.js"></script>
<script>
	$(document).foundation();
</script>
</body>
</html>