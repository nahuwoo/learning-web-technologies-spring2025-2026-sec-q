<?php
session_start();

$users = $_SESSION['users'] ?? [];
$id = $_GET['id'] ?? null;

$newUsers = [];

foreach ($users as $u) {
    if ($id != $u['id']) {
        $newUsers[] = $u; // FIXED
    }
}

$_SESSION['users'] = $newUsers;

header("location: user_list.php");
exit;
?>