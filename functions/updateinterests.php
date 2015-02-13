<?php
/**
 * Created by PhpStorm.
 * User: cashp
 * Date: 29/01/2015
 * Time: 12:36
 */
require_once '../core/settings.php';
$uid = $_SESSION['uid'];

$db=database::getInstance();
if(!is_null($_POST['interests'])){
    $SelectedInterests=$_POST['interests'];
}



if(!is_null($SelectedInterests)){
    $ResetInterests = $db->query("DELETE FROM user_interests WHERE user_id=?", array($uid));


    foreach($SelectedInterests as $box) {
    $uid = $_SESSION['uid'];

    $FindInterestID = $db->query("SELECT * FROM interests WHERE interest_id=?", array($box));

    $insertid = $FindInterestID->first();


        echo $box;
    $AddUserInterests = $db->query("INSERT INTO user_interests(user_id,interest_id) VALUES (?,?)", array($uid, $insertid->interest_id));
    //echo $interestid->interest;
    // echo '<br/>';
        //header("Location: profile.php");

}


}
