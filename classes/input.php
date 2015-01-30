<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 14/12/2014
 * Time: 18:16
 */
/**
 * Created by PhpStorm.
 * User: cashp
 * Date: 29/01/2015
 * Time: 12:36
 */
require_once '../core/settings.php';

$db=database::getInstance();
$uid = $_SESSION['uid'];

$ResetInterests = $db->query("DELETE FROM userinterests WHERE user_id=?", array($uid));


echo "END";

