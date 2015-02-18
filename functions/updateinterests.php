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
    $ResetInterests = $db->query("DELETE FROM user_interests
                                  WHERE userId=?",
                                  array($uid));


    foreach($SelectedInterests as $box) {


$db->query("INSERT INTO user_interests(userId,interestId)
            VALUES (?,?)",
            array($uid, $box));
    
    //echo $interestid->interest;
    // echo '<br/>';
        //header("Location: profile.php");

}


}
