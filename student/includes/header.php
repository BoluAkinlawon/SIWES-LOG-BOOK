<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIWES Electronic Logbook System</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<nav>
    <span class="brand">📓 SIWES Logbook</span>
    <div>
        <a href="../index.php">Home</a>
        <a href="../student/login.php">Student</a>
        <a href="../supervisor/login.php">Supervisor</a>
    </div>
</nav>
