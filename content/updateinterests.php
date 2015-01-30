<?php
/**
 * Created by PhpStorm.
 * User: cashp
 * Date: 29/01/2015
 * Time: 12:36
 */
require_once '../core/settings.php';

$SelectedInterests=$_POST['interests'];
$db=database::getInstance();
var_dump($SelectedInterests);

foreach($SelectedInterests as $box){
  $uid = $_SESSION['uid'];
    $FindInterestID = $db->query("SELECT * FROM interests WHERE interest=?", array($box));

    $insertid = $FindInterestID->first();


        $AddUserInterests = $db->query("INSERT INTO userinterests(user_id,interest_id) VALUES (?,?)", array($uid,$insertid->interest_id));
        //echo $interestid->interest;
        // echo '<br/>';



}
