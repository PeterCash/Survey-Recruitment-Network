<?php
/**
 * Created by PhpStorm.
 * User: cashp
 * Date: 29/01/2015
 * Time: 12:36
 */
require_once '../core/settings.php';

$SelectedInterests=$_POST['interestboxes'];
$db=database::getInstance();

foreach($SelectedInterests as $box){
    $userid = $_SESSION['uid'];
    $FindInterestID = $db->query("SELECT * FROM interests WHERE interest=?", array($box));

    foreach($FindInterestID->results() as $interestid)
    {

        $AddUserInterests = $db->query("INSERT INTO userinterests(user_id,interest_id) VALUES (?,?)", array($userid,$interestid->interest_id));
        echo $interestid->interest_id;
        echo $userid;
        echo '<br/>';
    }
}
