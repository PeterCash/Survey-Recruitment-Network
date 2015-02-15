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
$user = getUser(1, Database::getInstance());

?>

<!DOCTYPE html>
<html  class="no-js" lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Survey Recruitment Network</title>
	<link rel="stylesheet" type="text/css" href="main.css">

	<!-- If you are using the CSS version, only link these 2 files, you may add app.css to use for your overrides if you like -->
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/foundation.css">



	<script src="../js/vendor/modernizr.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="http://malsup.github.com/jquery.form.js"></script>

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

	</nav>

</br>

<ul class="tabs" data-tab>
	<li class="tab-title active"><a href="#demo">Demographic</a></li>
	<li class="tab-title"><a href="#interests">Interests</a></li>
</ul>

<div class="medium-12 columns">
<div class="tabs-content">
	<div class="content active" id="demo">
		<div class="row">
			<form data-abide>


				<div class="row">
					<div class="medium-6 columns">
						<label for="author">Author Name</label><br/>
						<input name="author" type="text" disabled="disabled"
						value="<?php echo $user->firstName . " " . $user->lastName ?>">
					</div>
				</div>

				<div class="row">
					<div class="medium-6 columns">
						<label for="user">User Name</label><br/>
						<input name="user" type="text" disabled="disabled" value="<?php echo $user->username ?>">
					</div>
				</div>

				<div class="row">
					<div class="medium-8 columns">
						<label for="title">Title</label><br/>
						<input name="title" type="text" required>
						<small class="error">A title is required</small>
					</div>
				</div>

				<div class="row">
					<div class="medium-4 columns">
						<label for="title">Target Age</label><br/>
						<input name="age" type="number">
					</div>
				</div>

				<div class="row">
					<div class="medium-6 columns">
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
				</div>

				<br/>
				<br/>
		</div>


	</div>

	<div class="content" id="interests">
    <p>This is the second panel of the basic tab example. This is the second panel of the basic tab example.</p>
  </div>

</div>

<div class="row footer">
			<input id="surveySubmit" class="button medium-10" type="submit" value="Create This Survey"/>
			<!-- <img id="preloader" src="../images/loading.gif" style="padding-left: 10px;">-->
</div>
</form>
</div>

</div>







<script src="../js/vendor/jquery.js"></script>
<script src="../js/foundation.min.js"></script>
<script>
$(document).foundation();
</script>
</body>
</html>