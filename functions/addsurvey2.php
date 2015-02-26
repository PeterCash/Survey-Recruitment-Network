<?php
var_dump($_POST);



foreach($_POST as $question => $answers) {
	
	echo $question;

	echo '<br/>';

	foreach($answers as $ans)
	{
		echo $ans;
		echo '<br/>';
	}


}


?>