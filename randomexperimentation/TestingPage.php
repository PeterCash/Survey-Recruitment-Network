<?php
include 'settings.php';

$db = new Database();


$db->query("INSERT INTO user_interests(userId,interestId) VALUES (?,?)");
$db->addParameter(1);
$db->addParameter(55);
$db->execute();

unset($db);
$db = new Database();

$db->query("SELECT * FROM user_interests WHERE userId=?");
$db->addParameter(1);
$db->execute();

foreach ($db->resultset() as $row) {
    echo $row['userId'];
}


?>