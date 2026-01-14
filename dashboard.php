<?php
session_start();
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

$username = isset($_SESSION['username']) ? $_SESSION['username'] : "User";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h1>Welcome, Mr. <?php echo htmlspecialchars($username); ?></h1>
<p>You are logged in successfully.</p>

<a href="logout.php">Logout</a>

</body>
</html>
