<?php
require_once '../core/settings.php';

$db = database::getInstance();

$userId = $_SESSION['uid'];
$title = $_POST['title'];
$age  = $_POST['age'];
$county = $_POST['county'];

$user = $db->query("SELECT * FROM users WHERE username=?", array($username));