<?php
session_start();

if (!isset($_SESSION['name']) || !isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

if (!isset($_SESSION['last_subject'])) {
    echo "No quiz to retake.";
    exit;
}

header("Location: {$_SESSION['last_subject']}");
exit;
?>