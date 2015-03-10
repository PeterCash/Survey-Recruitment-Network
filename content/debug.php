<?php
require_once '../core/settings.php';

$db = database::getInstance();

$userId = 1;
$title = "Title";
$age = 1;
$county = 1;

echo $userId;
echo $title;
echo $age;
echo $county;


$db->query("INSERT INTO counties(county)
					VALUES (?)",
    array($title));
?>