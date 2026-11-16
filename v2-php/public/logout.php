<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../src/Auth.php';

$auth = new Auth($pdo);
$auth->logout();

header("Location: login.php");
exit;