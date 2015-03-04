<?php
/**
 * Created by PhpStorm.
 * User: cashp
 * Date: 29/01/2015
 * Time: 12:36
 */
include "../content/database.php";
session_start();
$uid = $_SESSION['uid'];
$db = new Database();


if(!is_null($_POST['interests'])){
    $SelectedInterests=$_POST['interests'];
}



if(!is_null($SelectedInterests)){
    $db->beginTransaction();
    $ResetInterests = $db->query("DELETE FROM user_interests
      WHERE userId=?");
    $db->addParameter($uid);
    $db->execute();
    $db->endTransaction();

    $db->beginTransaction();
    foreach($SelectedInterests as $box) {

        $db->query("INSERT INTO user_interests(userId,interestId)
            VALUES (?,?)");
        $db->addParameter($uid);
        $db->addParameter($box);
        $db->execute();

    //echo $interestid->interest;
    // echo '<br/>';
        //header("Location: profile.ph

    }
    $db->endTransaction();

    header("Location: ../content/profile.php");

}
